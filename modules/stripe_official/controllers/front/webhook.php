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

use Stripe\Event;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Webhook;
use Stripe_officialClasslib\Actions\ActionsHandler;
use StripeOfficial\Controllers\Traits\ProcessLoggerTrait;

class stripe_officialWebhookModuleFrontController extends ModuleFrontController
{
    use ProcessLoggerTrait;

    /**
     * Override displayMaintenancePage to prevent the maintenance page to be displayed.
     *
     * @see FrontController::displayMaintenancePage()
     */
    protected function displayMaintenancePage()
    {
    }

    /**
     * Override displayRestrictedCountryPage to prevent page country is not allowed.
     *
     * @see FrontController::displayRestrictedCountryPage()
     */
    protected function displayRestrictedCountryPage()
    {
    }

    /**
     * Override geolocationManagement to prevent country GEOIP blocking.
     *
     * @see FrontController::geolocationManagement()
     *
     * @param Country $defaultCountry
     *
     * @return false
     */
    protected function geolocationManagement($defaultCountry)
    {
    }

    /**
     * Override sslRedirection to prevent redirection.
     *
     * @see FrontController::sslRedirection()
     */
    protected function sslRedirection()
    {
    }

    /**
     * Override canonicalRedirection to prevent redirection.
     *
     * @see FrontController::canonicalRedirection()
     *
     * @param string $canonical_url
     */
    protected function canonicalRedirection($canonical_url = '')
    {
    }

    public function postProcess()
    {
        $this->logInfo('[ Webhook Process Beginning ]', 'webhook - postProcess');

        // Retrieve secret API key
        $secret_key = $this->module->getSecretKey();

        // Check API key validity
        $this->checkApiKey($secret_key);

        // Retrieve payload
        $input = @Tools::file_get_contents('php://input');
        $this->logInfo('$input => ' . $input, 'webhook - postProcess');

        // Retrieve http signature
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $this->logInfo('set http stripe signature => ' . $sig_header, 'webhook - postProcess');

        // Retrieve secret endpoint
        $endpoint_secret = Configuration::get(Stripe_official::WEBHOOK_SIGNATURE, null, Stripe_official::getShopGroupIdContext(), Stripe_official::getShopIdContext());
        $this->logInfo('set endpoint secret => ' . $endpoint_secret, 'webhook - postProcess');

        // Construct event charge
        $event = $this->constructEvent($input, $sig_header, $endpoint_secret);

        // Check if shop is the good one
        $cart = new Cart($event->data->object->metadata->id_cart);
        if ($cart->id_shop_group != Stripe_official::getShopGroupIdContext()
            || $cart->id_shop != Stripe_official::getShopIdContext()) {
            $msg = 'This cart does not come from this shop, cartId: ' . $cart->id;
            $this->logInfo($msg, 'webhook - postProcess');

            http_response_code(200);
            echo $msg;
            exit;
        }

        // Retrieve payment intent
        if (
            Event::PAYMENT_INTENT_REQUIRES_ACTION == $event->type ||
            Event::PAYMENT_INTENT_SUCCEEDED == $event->type ||
            Event::PAYMENT_INTENT_CANCELED == $event->type
        ) {
            $paymentIntent = $event->data->object->id;
        } else {
            $paymentIntent = $event->data->object->payment_intent;
        }
        $this->logInfo('payment_intent : ' . $paymentIntent, 'webhook - postProcess');

        // Registry Stripe event in database
        $registeredEvent = $this->registerEvent($event, $paymentIntent);

        // Create the handler
        $handler = $this->createWebhookHandler($event, $paymentIntent);

        // Handle actions
        $this->handleWebhookActions($handler, $event);

        // Valid Stripe event process
        $this->validProcessEvent($registeredEvent);
        $this->logInfo('[ Webhook Process Ending ]', 'webhook - postProcess');

        exit;
    }

    private function checkApiKey($secretKey)
    {
        try {
            $this->logInfo($secretKey, 'webhook - checkApiKey');

            Stripe::setApiKey($secretKey);

            // Retrieve the request's body and parse it as JSON
            $this->logInfo('setApiKey ok. Retrieve the request\'s body and parse it as JSON', 'webhook - checkApiKey');
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->exceptionErrorLogger('setApiKey not ok: ' . $e->getMessage(), 'webhook - checkApiKey');

            exit;
        }
    }

    private function constructEvent($payload, $sigHeader, $secret)
    {
        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $secret
            );

            if (!$event) {
                $msg = 'JSON not valid';
                $this->exceptionErrorLogger($msg, 'webhook - constructEvent');
                echo $msg;
                exit;
            }

            if (!in_array($event->type, Stripe_official::$webhook_events)) {
                $msg = 'webhook "' . $event->type . '" call not yet supported';
                $this->logInfo($msg, 'webhook - constructEvent');
                echo $msg;
                exit;
            }

            $this->logInfo('$event => ' . $event, 'webhook - constructEvent');
            $this->logInfo('event ' . $event->id . ' retrieved', 'webhook - constructEvent');
            $this->logInfo('event type : ' . $event->type, 'webhook - constructEvent');

            return $event;
        } catch (UnexpectedValueException $e) {
            // Invalid payload
            $this->exceptionErrorLogger('Invalid payload : ' . $e->getMessage(), 'webhook - constructEvent');
            echo $e->getMessage();
            exit;
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            $this->exceptionErrorLogger('Invalid signature : ' . $e->getMessage(), 'webhook - constructEvent');
            echo $e->getMessage();
            exit;
        }
    }

    private function registerEvent($event, $paymentIntent)
    {
        try {
            $stripeEventStatus = $this->checkEventStatus($event, $paymentIntent);
            $stripeEventDate = new DateTime();
            $stripeEventDate = $stripeEventDate->setTimestamp($event->created);

            $stripeEvent = new StripeEvent();
            $stripeEvent = $stripeEvent->getEventByPaymentIntentNStatus($paymentIntent, $stripeEventStatus);
            if (null != $stripeEvent->id) {
                $stripeEvent->setDateAdd($stripeEventDate->format('Y-m-d H:i:s'));
            } else {
                $stripeEvent->setIdPaymentIntent($paymentIntent);
                $stripeEvent->setStatus($stripeEventStatus);
                $stripeEvent->setDateAdd($stripeEventDate->format('Y-m-d H:i:s'));
                $stripeEvent->setIsProcessed(false);
            }

            if (!$stripeEvent->save()) {
                $msg = 'An issue appears during saving Stripe module event in database (the event probably already exists).';
                $this->logInfo($msg, 'webhook - registerEvent');
                http_response_code(400);
                exit($msg);
            }

            return $stripeEvent;
        } catch (PrestaShopException $e) {
            $msg = 'A problem appears while recording the Stripe module event => ' . $e->getMessage();
            $this->logInfo($msg, 'webhook - registerEvent');
            http_response_code(400);
            exit($msg);
        }
    }

    private function validProcessEvent($registeredEvent)
    {
        try {
            $registeredEvent->setIsProcessed(true);
            if (!$registeredEvent->save()) {
                $msg = 'An issue appears while updating the Stripe module event';
                $this->logInfo($msg, 'webhook - validProcessEvent');
                http_response_code(400);
                exit($msg);
            }
        } catch (PrestaShopException $e) {
            $msg = 'A problem appears while completing the Stripe event process => ' . $e->getMessage();
            $this->logInfo($msg, 'webhook - validProcessEvent');
            http_response_code(400);
            exit($msg);
        }
    }

    private function checkEventStatus($event, $paymentIntent)
    {
        $paymentMethodType = $this->getPaymentMethodFromEvent($event);

        if (Event::PAYMENT_INTENT_SUCCEEDED === $event->type && 'klarna' === $paymentMethodType) {
            $eventStatus = StripeEvent::getStatusAssociatedToChargeType('captured');
        } else {
            $eventStatus = StripeEvent::getStatusAssociatedToChargeType($event->type);
        }

        if (!$eventStatus) {
            $msg = 'Charge event does not need to be processed : ' . $event->type;
            $this->logInfo($msg, 'webhook - checkEventStatus');
            http_response_code(200);
            exit($msg);
        }

        $lastRegisteredEvent = new StripeEvent();
        $lastRegisteredEvent = $lastRegisteredEvent->getLastRegisteredEventByPaymentIntent($paymentIntent);

        if (null == $lastRegisteredEvent->id) {
            $msg = 'This payment intent doesn\'t exist. This charge event is perhaps intended for another webhook.';
            $this->logInfo($msg, 'webhook - checkEventStatus');
            http_response_code(200);
            exit($msg);
        }

        if ($lastRegisteredEvent->status != $eventStatus && null != $lastRegisteredEvent->date_add) {
            $lastRegisteredEventDate = new DateTime($lastRegisteredEvent->date_add);
            $currentEventDate = new DateTime();
            $currentEventDate = $currentEventDate->setTimestamp($event->created);
            if ($lastRegisteredEventDate > $currentEventDate) {
                $msg = 'This charge event come too late to be processed [Last event : ' . $lastRegisteredEventDate->format('Y-m-d H:m:s') . ' | Current event : ' . $currentEventDate->format('Y-m-d H:m:s') . '].';
                $this->logInfo($msg, 'webhook - checkEventStatus');
                http_response_code(200);
                exit($msg);
            }
        }

        if ($lastRegisteredEvent->status == $eventStatus && StripeEvent::REFUNDED_STATUS !== $eventStatus) {
            if ($lastRegisteredEvent->isProcessed()) {
                $msg = 'This Stripe module event "' . $eventStatus . '" has already been processed.';
                $this->logInfo($msg, 'webhook - checkEventStatus');
                http_response_code(200);
                echo $msg;
                exit;
            }
            $this->logInfo(
                $eventStatus . ' event restarted because the previous one did not complete processing, EventId:' . $lastRegisteredEvent->id,
                'webhook - checkEventStatus'
            );
        } elseif ((!StripeEvent::validateTransitionStatus($lastRegisteredEvent->status, $eventStatus) || !$lastRegisteredEvent->isProcessed()) && StripeEvent::REFUNDED_STATUS !== $eventStatus) {
            if (StripeEvent::CAPTURED_STATUS === $eventStatus &&
                'card' == $paymentMethodType &&
                'on' != Configuration::get(Stripe_official::CATCHANDAUTHORIZE)
            ) {
                $msg = 'The card payment amount has already been captured.';
                $this->logInfo($msg, 'webhook - checkEventStatus');
                http_response_code(200);
                exit($msg);
            }
            $msg = 'This Stripe module event "' . $eventStatus . '" cannot be processed because [Last event status: ' . $lastRegisteredEvent->status . ' | Processed : ' . ($lastRegisteredEvent->isProcessed() ? 'Yes' : 'No') . ']. EventId:' . $lastRegisteredEvent->id;
            $this->logInfo($msg, 'webhook - checkEventStatus');
            http_response_code(400);
            exit($msg);
        } elseif (StripeEvent::REFUNDED_STATUS === $eventStatus && !StripeEvent::validateTransitionStatus($lastRegisteredEvent->status, $eventStatus)) {
            $msg = 'This Stripe module event "' . $eventStatus . '" cannot be processed because [Last event status: ' . $lastRegisteredEvent->status . ' | Processed : ' . ($lastRegisteredEvent->isProcessed() ? 'Yes' : 'No') . ']. EventId:' . $lastRegisteredEvent->id;
            $this->logInfo($msg, 'webhook - checkEventStatus');
            http_response_code(400);
            exit($msg);
        } elseif (StripeEvent::REFUNDED_STATUS === $eventStatus && !$event->data->object->captured) {
            $msg = 'This Stripe module event "' . $eventStatus . '" cannot be processed because [Last event status: ' . $lastRegisteredEvent->status . ' | Processed : ' . ($lastRegisteredEvent->isProcessed() ? 'Yes' : 'No') . ']. EventId:' . $lastRegisteredEvent->id;
            $this->logInfo($msg, 'webhook - checkEventStatus');
            http_response_code(400);
            exit($msg);
        }

        return $eventStatus;
    }

    private function createWebhookHandler($event, $paymentIntent)
    {
        $this->logInfo('creating webhook handler', 'webhook - createWebhookHandler');

        $events_states = [
            Event::CHARGE_EXPIRED => Configuration::get('PS_OS_CANCELED'),
            Event::CHARGE_FAILED => Configuration::get('PS_OS_ERROR'),
            Event::CHARGE_SUCCEEDED => Configuration::get('PS_OS_PAYMENT'),
            Event::CHARGE_CAPTURED => Configuration::get('PS_OS_PAYMENT'),
            Event::PAYMENT_INTENT_SUCCEEDED => Configuration::get('PS_OS_PAYMENT'),
            Event::PAYMENT_INTENT_CANCELED => Configuration::get('PS_OS_CANCELED'),
            Event::CHARGE_REFUNDED => Configuration::get('PS_OS_REFUND'),
            Event::CHARGE_DISPUTE_CREATED => Configuration::get(Stripe_official::SEPA_DISPUTE),
        ];

        $handler = new ActionsHandler();
        $handler->setConveyor([
            'event_json' => $event,
            'module' => $this->module,
            'context' => $this->context,
            'events_states' => $events_states,
            'paymentIntent' => $paymentIntent,
        ]);

        return $handler;
    }

    private function handleWebhookActions($handler, $event)
    {
        $this->logInfo('Starting webhook actions', 'webhook - handleWebhookActions');

        $eventType = $event->type;

        $paymentMethodType = $this->getPaymentMethodFromEvent($event);

        if ((Event::CHARGE_SUCCEEDED == $eventType && 'card' == $paymentMethodType)
            || (Event::CHARGE_PENDING == $eventType && 'sepa_debit' == $paymentMethodType)
            || (Event::PAYMENT_INTENT_REQUIRES_ACTION == $eventType && 'oxxo' == $paymentMethodType)
        ) {
            $this->logInfo('Payment method flow without redirection', 'webhook - handleWebhookActions');
            $handler->addActions(
                'prepareFlowNone',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'saveCard',
                'addTentative'
            );
        } elseif ((Event::CHARGE_PENDING == $eventType && 'sofort' == $paymentMethodType)
            || (Event::CHARGE_SUCCEEDED == $eventType
                && 'redirect' == Stripe_official::$paymentMethods[$paymentMethodType]['flow']
                && 'sofort' != $paymentMethodType)
        ) {
            $this->logInfo('Payment method flow with redirection', 'webhook - handleWebhookActions');
            $handler->addActions(
                'prepareFlowRedirectPaymentIntent',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'saveCard',
                'addTentative'
            );
        } else {
            $handler->addActions('chargeWebhook');
        }

        // Process actions chain
        if (!$handler->process('ValidationOrderActions')) {
            // Handle error
            $this->exceptionErrorLogger(
                'Webhook actions process failed.',
                'webhook - handleWebhookActions'
            );
        }
    }

    private function getPaymentMethodFromEvent($event)
    {
        $paymentMethodType = null;
        if (Event::PAYMENT_INTENT_SUCCEEDED === $event->type && isset($event->data->object->charges->data[0]->payment_method_details->type)) {
            $paymentMethodType = $event->data->object->charges->data[0]->payment_method_details->type;
        } elseif (isset($event->data->object->payment_method_details->type)) {
            $paymentMethodType = $event->data->object->payment_method_details->type;
        } elseif (isset($event->data->object->payment_method_types[0])) {
            $paymentMethodType = $event->data->object->payment_method_types[0];
        }

        return $paymentMethodType;
    }
}
