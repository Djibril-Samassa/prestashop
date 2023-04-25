<?php
/**
 * Copyright (c) since 2010 Stripe, Inc. (https://stripe.com)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    Stripe <https://support.stripe.com/contact/email>
 * @copyright Since 2010 Stripe, Inc.
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

use StripeOfficial\Controllers\Traits\GeneralTrait;
use StripeOfficial\Controllers\Traits\ProcessLoggerTrait;
use StripeOfficial\Controllers\Traits\StripeTrait;

class stripe_officialCreateElementsModuleFrontController extends ModuleFrontController
{
    use ProcessLoggerTrait;
    use GeneralTrait;
    use StripeTrait;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $this->logInfo('[ Elements Creation Beginning ]', 'createElements - initContent');
        $elementData = $billingDetails = [];

        try {
            $elementData = $this->constructIntentData($this->context->cart->id, false, Configuration::get(Stripe_official::CATCHANDAUTHORIZE));
            $elementData['mode'] = 'payment';
            $addressDetails = new Address($this->context->cart->id_address_invoice);
            $shippingAddressState = new State($addressDetails->id_state);
            $country = Country::getIsoById($addressDetails->id_country);
            $billingDetails = $this->createBillingDetails($addressDetails, $shippingAddressState, $this->context->customer, $country);
            $currency = new Currency($this->context->cart->id_currency);
            $amount = $this->context->cart->getOrderTotal();
            $amount = round($amount, 2);
            $elementData['amount'] = $this->module->isZeroDecimalCurrency($currency->iso_code) ? (int) $amount : (int) number_format($amount * 100, 0, '', '');
            $elementData['currency'] = $currency->iso_code;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $this->exceptionErrorLogger('Retrieve Stripe Account Error => ' . $e->getMessage(), 'createElements - initContent');
        } catch (PrestaShopDatabaseException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'createElements - initContent');
        } catch (PrestaShopException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'createElements - initContent');
        }

        $this->logInfo('[ Elements Init Ending ]' . json_encode($elementData), 'createElements - initContent');

        echo json_encode([
            'element' => $elementData,
            'billing_details' => $billingDetails,
        ])
        ;
        exit;
    }
}
