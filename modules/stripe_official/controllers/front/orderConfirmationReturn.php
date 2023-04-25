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

use StripeOfficial\Controllers\Traits\ProcessLoggerTrait;
use StripeOfficial\Controllers\Traits\StripeTrait;

class stripe_officialOrderConfirmationReturnModuleFrontController extends ModuleFrontController
{
    use ProcessLoggerTrait;
    use StripeTrait;

    public function __construct()
    {
        parent::__construct();
        $this->ssl = true;
        $this->ajax = true;
        $this->json = true;
    }

    /**
     * @throws Exception
     *
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $flow = 'none';
        if (Tools::getValue('cartId')) {
            // for redirect payment methods
            $cartId = Tools::getValue('cartId');
            $stripeIdempotencyKey = new StripeIdempotencyKey();
            $stripeIdempotencyKey = $stripeIdempotencyKey->getByIdCart($cartId);
            if ($stripeIdempotencyKey->id_payment_intent) {
                $session = \Stripe\Checkout\Session::retrieve($stripeIdempotencyKey->id_payment_intent);
                if ($session->id && $session->payment_intent) {
                    $intent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
                    try {
                        $stripeIdempotencyKey->createForCheckoutIntent($intent);
                    } catch (\Stripe\Exception\ApiErrorException $e) {
                        $this->exceptionErrorLogger('Retrieve Stripe Checkout Session Error=> ' . $e->getMessage(), 'initContent - orderConfirmationReturn');

                        return false;
                    }
                    $this->registerStripeEvent($intent, null, StripeEvent::CREATED_STATUS);
                    $flow = 'redirect';
                }
            }
        } else {
            if (Tools::getValue('payment_intent')) {
                // for redirect payment methods
                $payment_intent = Tools::getValue('payment_intent');
            } else {
                $payment_intent = Tools::getValue('paymentIntent');
            }

            $intent = \Stripe\PaymentIntent::retrieve(
                $payment_intent
            );
        }

        if (isset($intent->payment_method_details->type)) {
            $payment_method = $intent->payment_method_details->type;
        } elseif (isset($intent->payment_method_types[0])) {
            $payment_method = $intent->payment_method_types[0];
        } elseif (!isset($intent)) {
            http_response_code(400);
            exit('An unexpected problem has occurred when retrieve the intent.');
        } else {
            $payment_method = null;
        }

        if ('failed' == Tools::getValue('redirect_status')) {
            $url = Context::getContext()->link->getModuleLink(
                'stripe_official',
                'orderFailure',
                [],
                true
            );
        } else {
            $data = [
                'payment_intent' => $intent->id,
                'payment_method' => $payment_method,
            ];

            $url = Context::getContext()->link->getModuleLink(
                'stripe_official',
                'orderSuccess',
                $data,
                true
            );
        }

        // for redirect payments
        if ('redirect' == Stripe_official::$paymentMethods[$payment_method]['flow'] || 'redirect' === $flow) {
            Tools::redirect($url);
            exit;
        }

        echo json_encode($url);
        exit;
    }
}
