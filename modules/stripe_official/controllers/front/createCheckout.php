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

use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use StripeOfficial\Controllers\Traits\GeneralTrait;
use StripeOfficial\Controllers\Traits\ProcessLoggerTrait;
use StripeOfficial\Controllers\Traits\StripeTrait;

class stripe_officialCreateCheckoutModuleFrontController extends ModuleFrontController
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

        $this->logInfo('[ Checkout Session Creation Beginning ]', 'initContent - constructCheckoutData');
        $checkoutData = [];

        try {
            $cart = $this->context->cart;
            $currency = new Currency($cart->id_currency);
            $shippingAddress = new Address($this->context->cart->id_address_delivery);
            $shippingAddressState = new State($shippingAddress->id_state);
            $country = Country::getIsoById($shippingAddress->id_country);
            $shippingAddress = $this->getShippingDetails($shippingAddress, $shippingAddressState, $country, $this->context->customer);

            $intentData = $this->constructIntentData($this->context->cart->id, true, Configuration::get(Stripe_official::CATCHANDAUTHORIZE));
            $intentData['shipping'] = $shippingAddress;
            $finalPrice = $this->module->isZeroDecimalCurrency($currency->iso_code) ? $cart->getOrderTotal() : $cart->getOrderTotal() * 100;

            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency->iso_code,
                    'unit_amount_decimal' => round($finalPrice, 2),
                    'product_data' => [
                        'name' => 'Products Purchase',
                    ],
                ],
                'quantity' => 1,
            ];

            $customer = $this->getCustomerDetails($this->context->customer, $intentData);
            $checkoutData = $this->constructCheckoutData($intentData, $lineItems, $customer);

            try {
                $this->createIdempotencyKey($this->context->cart, $intentData, $checkoutData->id);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $this->exceptionErrorLogger('Create Stripe Intent Error => ' . $e->getMessage(), 'Checkout - createIdempotencyKey');
            } catch (PrestaShopException $e) {
                $this->exceptionErrorLogger('Save Stripe Idempotency Key Error => ' . $e->getMessage(), 'Checkout - createIdempotencyKey');
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $this->exceptionErrorLogger('Retrieve Stripe Account Error => ' . $e->getMessage(), 'initContent - constructCheckoutData');
        } catch (PrestaShopDatabaseException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'initContent - constructCheckoutData');
        } catch (PrestaShopException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'initContent - constructCheckoutData');
        }

        $this->logInfo('[ Checkout Session Init Ending ]', 'initContent - constructCheckoutData');

        echo json_encode([
            'checkout' => $checkoutData,
        ]);
        exit;
    }

    private function constructCheckoutData($intent, $lineItems, $customer = null)
    {
        $checkoutSession = [];
        try {
            $stripeOrderFailureReturnUrl = $this->context->link->getModuleLink(
                'stripe_official',
                'orderFailure',
                [],
                true
            );

            $stripeOrderSuccessReturnUrl = $this->context->link->getModuleLink(
                'stripe_official',
                'orderConfirmationReturn',
                ['cartId' => $this->context->cart->id],
                true
            );

            $checkoutParams = [
                'line_items' => $lineItems,
                'payment_intent_data' => $intent,
                'mode' => Session::MODE_PAYMENT,
                'metadata' => [
                    'id_cart' => $this->context->cart->id,
                ],
                'success_url' => $stripeOrderSuccessReturnUrl,
                'cancel_url' => $stripeOrderFailureReturnUrl,
            ];
            if ($customer) {
                $checkoutParams['customer'] = $customer;
            }
            $checkoutSession = Session::create($checkoutParams);

            $this->logInfo('Checkout Data => ' . json_encode($checkoutSession), 'constructCheckoutData - constructCheckoutData');
        } catch (ApiErrorException $e) {
            $this->exceptionErrorLogger('Retrieve Stripe Account Error => ' . $e->getMessage(), 'constructCheckoutData');
        } catch (PrestaShopDatabaseException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'constructCheckoutData');
        } catch (PrestaShopException $e) {
            $this->exceptionErrorLogger('Retrieve Prestashop State Error => ' . $e->getMessage(), 'constructCheckoutData');
        }

        return $checkoutSession;
    }
}
