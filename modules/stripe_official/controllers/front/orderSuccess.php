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

use Stripe_officialClasslib\Actions\ActionsHandler;
use StripeOfficial\Controllers\Traits\ProcessLoggerTrait;
use StripeOfficial\Controllers\Traits\StripeTrait;

class stripe_officialOrderSuccessModuleFrontController extends ModuleFrontController
{
    use ProcessLoggerTrait;
    use StripeTrait;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $intent = $this->retrievePaymentIntent();

        if ($this->checkAndSaveStripeEvent($intent)) {
            $this->handleWebhookActions($intent);
        }

        $this->displayOrderConfirmation($intent);
    }

    private function retrievePaymentIntent()
    {
        try {
            $payment_intent = Tools::getValue('payment_intent');
            $intent = \Stripe\PaymentIntent::retrieve($payment_intent);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $intent = null;
            $this->logInfo('Retrieve payment intent : ' . $e->getMessage(), 'orderSuccess - retrievePaymentIntent');
        }
        $this->logInfo('Retrieve payment intent : ' . $intent, 'orderSuccess - retrievePaymentIntent');

        return $intent;
    }

    private function checkEventStatus($paymentIntent)
    {
        $eventCharge = isset($paymentIntent->charges->data[0]) ? $paymentIntent->charges->data[0] : $paymentIntent;

        $stripeEventStatus = StripeEvent::getStatusAssociatedToChargeType($eventCharge->status);
        $this->logInfo('$stripeEventStatus : ' . json_encode($stripeEventStatus), 'EventStatus');
        if (!$stripeEventStatus) {
            $this->logInfo('Charge event does not need to be processed : ' . $eventCharge->status, 'orderSuccess - checkEventStatus');

            return false;
        }

        $lastRegisteredEvent = new StripeEvent();
        $lastRegisteredEvent = $lastRegisteredEvent->getLastRegisteredEventByPaymentIntent($paymentIntent->id);

        $this->logInfo('Last registered event => ID : ' . $lastRegisteredEvent->id, 'orderSuccess - checkEventStatus');

        if (null != $lastRegisteredEvent->date_add) {
            $lastRegisteredEventDate = new DateTime($lastRegisteredEvent->date_add);
            $currentEventDate = new DateTime();
            $currentEventDate = $currentEventDate->setTimestamp($eventCharge->created);
            if ($lastRegisteredEventDate > $currentEventDate) {
                $this->logInfo(
                    'This charge event come too late to be processed [Last event : ' . $lastRegisteredEventDate->format('Y-m-d H:m:s') . ' | Current event : ' . $currentEventDate->format('Y-m-d H:m:s') . '].',
                    'orderSuccess - checkEventStatus'
                );

                return false;
            }
        }

        if (!StripeEvent::validateTransitionStatus($lastRegisteredEvent->status, $stripeEventStatus) && 'REFUNDED' != $stripeEventStatus) {
            $this->logInfo(
                'This Stripe module event "' . $stripeEventStatus . '" cannot be processed because [Last event status: ' . $lastRegisteredEvent->status . ' | Processed : ' . ($lastRegisteredEvent->isProcessed() ? 'Yes' : 'No') . '].',
                'orderSuccess - checkEventStatus'
            );

            return false;
        }

        return $stripeEventStatus;
    }

    /**
     * @throws Exception
     */
    private function checkAndSaveStripeEvent($paymentIntent)
    {
        $eventCharge = isset($paymentIntent->charges->data[0]) ? $paymentIntent->charges->data[0] : $paymentIntent;

        $stripeEventStatus = $this->checkEventStatus($paymentIntent);

        if (true === empty($stripeEventStatus)) {
            return false;
        }

        $this->logInfo('Display registerStripeEvent' . json_encode($stripeEventStatus), 'orderSuccess - registerStripeEvent');

        return $this->registerStripeEvent($paymentIntent, $eventCharge, $stripeEventStatus);
    }

    private function handleWebhookActions($intent)
    {
        $eventCharge = isset($intent->charges->data[0]) ? $intent->charges->data[0] : $intent;
        $eventType = $eventCharge->status;

        $payment_method = Tools::getValue('payment_method');

        $conveyorData = [
            'module' => $this->module,
            'context' => $this->context,
            'paymentIntent' => $intent->id,
        ];

        if ('oxxo' == $payment_method) {
            $conveyorData['voucher_url'] = $intent->next_action->oxxo_display_details->hosted_voucher_url;
            $conveyorData['voucher_expire'] = $intent->next_action->oxxo_display_details->expires_after;
        }

        $handler = new ActionsHandler();
        $handler->setConveyor($conveyorData);

        if (('succeeded' == $eventType && 'card' == $payment_method)
            || ('pending' == $eventType && 'sepa_debit' == $payment_method)
            || ('requires_action' == $eventType && 'oxxo' == $payment_method)
        ) {
            $this->logInfo('Payment method flow without redirection', 'orderSuccess - handleWebhookActions');
            $handler->addActions(
                'prepareFlowNone',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'saveCard',
                'addTentative'
            );
        } elseif (('pending' == $eventType && 'sofort' == $payment_method)
            || ('succeeded' == $eventType
                && 'redirect' == Stripe_official::$paymentMethods[$payment_method]['flow']
                && 'sofort' != $payment_method)
        ) {
            $this->logInfo('Payment method flow with redirection', 'orderSuccess - handleWebhookActions');
            $handler->addActions(
                'prepareFlowRedirectPaymentIntent',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'saveCard',
                'addTentative'
            );
        }

        if (!$handler->process('ValidationOrderActions')) {
            $this->exceptionErrorLogger('Order creation process disrupted.', 'orderSuccess - handleWebhookActions');
        }
    }

    private function displayOrderConfirmation($intent)
    {
        $this->logInfo('Display order confirmation', 'orderSuccess - displayOrderConfirmation');

        $id_order = 0;
        for ($i = 1; $i <= 15; ++$i) {
            if (empty($intent->metadata->id_cart)) {
                $stripePayment = new StripePayment();
                $stripePayment->getStripePaymentByPaymentIntent($intent->id);

                $id_cart = $stripePayment->id_cart;
            } else {
                $id_cart = $intent->metadata->id_cart;
            }

            if (true === empty($id_cart)) {
                break;
            }
            $id_order = $this->getOrderIdByCartId($id_cart);

            $this->logInfo('Waiting proccess time => ' . $i . 'Order Id => ' . $id_order, 'orderSuccess - displayOrderConfirmation');

            if (false === empty($id_order)) {
                $this->logInfo('Waiting proccess order OK', 'orderSuccess - displayOrderConfirmation');
                break;
            }

            sleep(2);
        }

        if (isset($this->context->customer->secure_key)) {
            $secure_key = $this->context->customer->secure_key;
        } else {
            $secure_key = false;
        }

        if (0 === $id_order) {
            $url = Context::getContext()->link->getModuleLink(
                'stripe_official',
                'orderFailure',
                [],
                true
            );

            $this->logInfo('Failed order url => ' . $url, 'orderSuccess - displayOrderConfirmation');
        } else {
            $url = Context::getContext()->link->getPageLink(
                'order-confirmation',
                true,
                null,
                [
                    'id_cart' => isset($id_cart) ? $id_cart : 0,
                    'id_module' => (int) $this->module->id,
                    'id_order' => $id_order,
                    'key' => $secure_key,
                ]
            );

            $this->logInfo('Confirmation order url => ' . $url, 'orderSuccess - displayOrderConfirmation');
        }

        Tools::redirect($url);
        exit;
    }

    private function getOrderIdByCartId($cartId)
    {
        $query = (new DbQuery())
            ->select('id_order')
            ->from(Order::$definition['table'])
            ->where('`id_cart` = ' . (int) $cartId);
        $orderId = Db::getInstance()->getValue($query, false);

        return empty($orderId) ? 0 : (int) $orderId;
    }
}
