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
use Stripe_officialClasslib\Extensions\ProcessLogger\ProcessLoggerHandler;

class stripe_officialValidationModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->ssl = true;
        $this->ajax = true;
        $this->json = true;
    }

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $url_failed = Context::getContext()->link->getModuleLink(
            $this->module->name,
            'orderFailure'
        );

        if (empty($this->context->cart->getProducts())) {
            $chargeResult = [
                'code' => '0',
                'url' => $url_failed,
            ];
            echo json_encode($chargeResult);
            exit;
        }

        // Create the handler
        $handler = new ActionsHandler();

        // Set input data
        $handler->setConveyor([
                    'source' => Tools::getValue('source'),
                    'response' => Tools::getValue('response'),
                    'id_payment_intent' => Tools::getValue('payment_intent'),
                    'saveCard' => Tools::getValue('saveCard'),
                    'module' => $this->module,
                    'context' => $this->context,
                ]);

        // Set list of actions to execute
        if (Tools::getValue('source')) {
            $handler->addActions(
                'prepareFlowRedirect',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'addTentative'
            );
        } elseif (Tools::getValue('payment_intent')) {
            $handler->addActions(
                'prepareFlowRedirectPaymentIntent',
                'updatePaymentIntent',
                'createOrder',
                'sendMail',
                'addTentative'
            );
        }

        // Process actions chain
        if ($handler->process('ValidationOrderActions')) {
            // Retrieve and use resulting data
            $returnValues = $handler->getConveyor();
        } else {
            // Handle error
            ProcessLoggerHandler::logError('Order validation process failed.');
            ProcessLoggerHandler::closeLogger();

            Tools::redirect($url_failed);
        }

        $id_order = Order::getOrderByCartId($this->context->cart->id);

        if (isset($this->context->customer->secure_key)) {
            $secure_key = $this->context->customer->secure_key;
        } else {
            $secure_key = false;
        }

        $url = Context::getContext()->link->getPageLink(
            'order-confirmation',
            true,
            null,
            [
                'id_cart' => (int) $this->context->cart->id,
                'id_module' => (int) $this->module->id,
                'id_order' => (int) $id_order,
                'key' => $secure_key,
            ]
        );

        if (!empty(Tools::getValue('source')) || !empty(Tools::getValue('payment_intent'))) {
            Tools::redirect($url);
            exit;
        }

        /* Ajax redirection Order Confirmation */
        $chargeResult = [
            'code' => '1',
            'url' => $url,
        ];

        echo json_encode($chargeResult);
        exit;
    }
}
