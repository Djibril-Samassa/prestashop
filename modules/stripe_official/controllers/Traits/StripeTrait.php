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

namespace StripeOfficial\Controllers\Traits;

use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;

trait StripeTrait
{
    protected function constructIntentData($cartId, $createCheckoutStatus, $captureMethod)
    {
        $captureMethod = ('on' == $captureMethod) ? 'manual' : 'automatic';

        $data = [
            'capture_method' => $captureMethod,
            'metadata' => [
                'id_cart' => $cartId,
            ],
            'description' => 'Product Purchase',
        ];

        if (false === $createCheckoutStatus) {
            if ('manual' === $captureMethod) {
                $data['capture_method'] = 'automatic';
                $data['payment_method_options'] = $this->getPaymentMethodOptions($captureMethod);
            }
            $data['automatic_payment_methods'] = ['enabled' => true];
        }

        return $data;
    }

    /**
     * @throws ApiErrorException
     * @throws \Exception
     */
    protected function createIdempotencyKey($cart, $intentData, $sessionId = null)
    {
        $intent = [];
        $stripeIdempotencyKey = new \StripeIdempotencyKey();
        $stripeIdempotencyKey = $stripeIdempotencyKey->getByIdCart($cart->id);
        $this->logInfo('[ createIdempotencyKey ]' . json_encode($stripeIdempotencyKey), 'start');
        if ($sessionId) {
            if (!$stripeIdempotencyKey->id_payment_intent) {
                $intent = $stripeIdempotencyKey->createForCheckout($cart->id, $sessionId);
                $this->logInfo('Create New Intent => ' . $intent->id_payment_intent, 'Checkout - createIdempotencyKey');
            }
        } else {
            if (!empty($stripeIdempotencyKey->id)) {
                $previousPaymentIntentData = PaymentIntent::retrieve($stripeIdempotencyKey->id_payment_intent);
                $paymentIntentStatus = $previousPaymentIntentData->status;
                $paymentIntentCaptureMethod = $previousPaymentIntentData->capture_method;
            } else {
                $paymentIntentStatus = null;
                $paymentIntentCaptureMethod = null;
            }

            $updatableStatus = ['requires_payment_method', 'requires_confirmation', 'requires_action'];
            $this->logInfo('Else => ' . json_encode($updatableStatus) . $paymentIntentStatus, 'Else - createIdempotencyKey');
            if (false === in_array($paymentIntentStatus, $updatableStatus)
                || $paymentIntentCaptureMethod !== $intentData['capture_method']
            ) {
                $intent = $stripeIdempotencyKey->createNewOne($cart->id, $intentData);
                $this->registerStripeEvent($intent, null, \StripeEvent::CREATED_STATUS);
            } else {
                unset($intentData['capture_method']);
                $intent = $stripeIdempotencyKey->updateIntentData($intentData);
            }
        }

        return $intent;
    }

    /**
     * @throws \Exception
     */
    protected function registerStripeEvent($intent, $eventCharge, $stripeEventStatus)
    {
        $stripeEventDate = new \DateTime();
        $dateCreated = (null != $eventCharge ? $eventCharge : $intent);
        $stripeEventDate = $stripeEventDate->setTimestamp($dateCreated->created);
        $this->logInfo('register Stripe Event=> ' . $stripeEventStatus . ' --- ' . json_encode($dateCreated), 'Stripe - registerStripeEvent');
        $stripeEvent = new \StripeEvent();
        $stripeEvent->setIdPaymentIntent($intent->id);
        $stripeEvent->setStatus($stripeEventStatus);
        $stripeEvent->setDateAdd($stripeEventDate->format('Y-m-d H:i:s'));
        $stripeEvent->setIsProcessed(true);
        $stripeEvent->setFlowType('direct');

        return $stripeEvent->save();
    }
}
