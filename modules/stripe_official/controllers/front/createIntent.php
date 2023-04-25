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

class stripe_officialCreateIntentModuleFrontController extends ModuleFrontController
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

        $this->logInfo('[ Intent Creation Beginning ]', 'createIntent - intiContent');
        $intent = $cardData = [];

        try {
            $shippingAddress = new Address($this->context->cart->id_address_delivery);
            $shippingAddressState = new State($shippingAddress->id_state);
            $country = Country::getIsoById($shippingAddress->id_country);
            $currency = new Currency($this->context->cart->id_currency);
            $amount = $this->context->cart->getOrderTotal();
            $amount = round($amount, 2);
            $shippingAddress = $this->getShippingDetails($shippingAddress, $shippingAddressState, $country, $this->context->customer);
            $intentData = $this->constructIntentData($this->context->cart->id, false, Configuration::get(Stripe_official::CATCHANDAUTHORIZE));
            $intentData['shipping'] = $shippingAddress;
            $intentData['amount'] = $this->module->isZeroDecimalCurrency($currency->iso_code) ? (int) $amount : (int) number_format($amount * 100, 0, '', '');
            $intentData['currency'] = $currency->iso_code;
            $intentData['customer'] = $this->getCustomerDetails($this->context->customer, $intentData);
            $cardData = $this->constructCardData();

            try {
                $intent = $this->createIdempotencyKey($this->context->cart, $intentData);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $this->exceptionErrorLogger('Create Stripe Intent Error => ' . $e->getMessage(), 'createIntent - createIdempotencyKey');
            } catch (PrestaShopException $e) {
                $this->exceptionErrorLogger('Save Stripe Idempotency Key Error => ' . $e->getMessage(), 'createIntent - createIdempotencyKey');
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $this->exceptionErrorLogger('Retrieve Stripe Account Error => ' . $e->getMessage(), 'createIntent');
        } catch (PrestaShopDatabaseException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'createIntent');
        } catch (PrestaShopException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'createIntent');
        }

        $this->logInfo('[ Intent Init Ending ]' . json_encode($intent), 'createIntent - intiContent');

        echo json_encode([
            'intent' => $intent,
            'cardPayment' => (!empty($cardData) ? $cardData['cardPayment'] : null),
            'saveCard' => (!empty($cardData) ? $cardData['save_card'] : null),
        ]);
        exit;
    }

    private function constructCardData()
    {
        $cardData['save_card'] = false;

        if (('true' == Tools::getValue('card_form_payment') && 'true' == Tools::getValue('save_card_form'))
            || ('true' == Tools::getValue('card_form_payment') && 'true' == Tools::getValue('stripe_auto_save_card'))
            && (!Tools::getValue('id_payment_method') || 'true' == Tools::getValue('payment_request'))
            && 'card' == Tools::getValue('payment_option')) {
            $cardData['cardPayment']['setup_future_usage'] = 'on_session';
            $cardData['save_card'] = true;
        } elseif ('card' != Tools::getValue('payment_option')) {
            $stripe_validation_return_url = $this->context->link->getModuleLink(
                'stripe_official',
                'orderConfirmationReturn',
                [
                    'id_cart' => $this->context->cart->id,
                ],
                true
            );
            $cardData['cardPayment']['return_url'] = $stripe_validation_return_url;
        }

        $this->logInfo('Card Payment => ' . json_encode($cardData), 'createIntent - constructCardPaymentData');

        return $cardData;
    }
}
