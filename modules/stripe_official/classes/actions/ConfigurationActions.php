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

use Stripe_officialClasslib\Actions\DefaultActions;

class ConfigurationActions extends DefaultActions
{
    protected $context;
    protected $module;

    /*
        Input : 'source', 'response', 'context', 'module'
        Output : 'token', 'id_payment_intent', 'status', 'chargeId', 'amount'
     */
    public function registerKeys()
    {
        $this->module = $this->conveyor['module'];
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();
        $mode = (int) Configuration::get(Stripe_official::MODE, null, $shopGroupId, $shopId);
        $secretKeyLive = Configuration::get(Stripe_official::KEY, null, $shopGroupId, $shopId);
        $secretKeyTest = Configuration::get(Stripe_official::TEST_KEY, null, $shopGroupId, $shopId);
        $webhookId = Configuration::get(Stripe_official::WEBHOOK_ID, null, $shopGroupId, $shopId);
        $secretKey = trim(Tools::getValue(Stripe_official::KEY));
        $publishableKey = trim(Tools::getValue(Stripe_official::PUBLISHABLE));
        $this->deleteWebhookId($shopId, $mode, $webhookId, $secretKeyTest, $secretKeyLive, $shopGroupId);
        $this->registerApiKeys($publishableKey, $secretKey, $mode, $shopId, $shopGroupId);

        return true;
    }

    /* If mode has changed delete webhook of previous mode */
    protected function deleteWebhookId($shopId, $mode, $webhookId, $secretKeyTest, $secretKeyLive, $shopGroupId)
    {
        $keyMode = Tools::getValue(Stripe_official::MODE);
        if ($keyMode != $mode && $webhookId
            && (($secretKeyTest && $mode) || ($secretKeyLive && !$mode))) {
            $secretKey = $mode ? $secretKeyTest : $secretKeyLive;
            $stripeClient = new \Stripe\StripeClient($secretKey);
            try {
                $stripeClient->webhookEndpoints->delete($webhookId);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $this->module->errors[] = $e->getMessage();
            }
            Configuration::updateValue(Stripe_official::WEBHOOK_SIGNATURE, '', false, $shopGroupId, $shopId);
        }
    }

    protected function registerApiKeys($publishableKey, $secretKey, $mode, $shopId, $shopGroupId)
    {
        $secretKeyNeedle = '';
        switch ($mode) {
            case 0:
                $secretKeyNeedle = '_live_';
                $secretKey = trim(Tools::getValue(Stripe_official::KEY));
                $publishableKey = trim(Tools::getValue(Stripe_official::PUBLISHABLE));

                break;

            case 1:
                $secretKeyNeedle = '_test_';
                $secretKey = trim(Tools::getValue(Stripe_official::TEST_KEY));
                $publishableKey = trim(Tools::getValue(Stripe_official::TEST_PUBLISHABLE));

                break;

            default:
                break;
        }
        Configuration::updateValue(Stripe_official::MODE, Tools::getValue(Stripe_official::MODE), false, $shopGroupId, $shopId);
        if (empty($secretKey) || empty($publishableKey)) {
            $this->module->errors[] = $this->module->l('Client ID and Secret Key fields are mandatory');

            return;
        }

        if (false === strpos($secretKey, $secretKeyNeedle) || false === strpos($publishableKey, $secretKeyNeedle)) {
            $this->module->errors[] = $this->module->l('Live API keys provided instead of test API keys');

            return;
        }
        if ($this->module->checkApiConnection($secretKey)) {
            if ($mode === 0) {
                Configuration::updateValue(Stripe_official::KEY, $secretKey, false, $shopGroupId, $shopId);
                Configuration::updateValue(Stripe_official::PUBLISHABLE, $publishableKey, false, $shopGroupId, $shopId);
            } else {
                Configuration::updateValue(Stripe_official::TEST_KEY, $secretKey, false, $shopGroupId, $shopId);
                Configuration::updateValue(Stripe_official::TEST_PUBLISHABLE, $publishableKey, false, $shopGroupId, $shopId);
            }
        }
    }

    /*
       Input : 'source', 'response', 'context', 'module'
       Output : 'token', 'id_payment_intent', 'status', 'chargeId', 'amount'
    */
    public function registerCatchAndAuthorize()
    {
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();

        if (!Tools::getValue('catchandauthorize')) {
            Configuration::updateValue(Stripe_official::CATCHANDAUTHORIZE, null, false, $shopGroupId, $shopId);
        } elseif (Tools::getValue('catchandauthorize')
            && '' != Tools::getValue('order_status_select')
            && '0' != Tools::getValue('capture_expired')) {
            Configuration::updateValue(Stripe_official::CAPTURE_EXPIRE, Tools::getValue('capture_expired'), false, $shopGroupId, $shopId);
            Configuration::updateValue(Stripe_official::CAPTURE_STATUS, Tools::getValue('order_status_select'), false, $shopGroupId, $shopId);
            Configuration::updateValue(Stripe_official::CATCHANDAUTHORIZE, Tools::getValue('catchandauthorize'), false, $shopGroupId, $shopId);
        } else {
            $this->module->errors[] = $this->module->l('Enable separate authorization and capture.');
        }

        return true;
    }

    /*
        Input : 'id_payment_intent', 'status'
        Output :
     */
    public function registerSaveCard()
    {
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();
        if (!Tools::getValue('save_card')) {
            Configuration::updateValue(Stripe_official::SAVE_CARD, null, false, $shopGroupId, $shopId);
        } else {
            Configuration::updateValue(Stripe_official::SAVE_CARD, Tools::getValue('save_card'), false, $shopGroupId, $shopId);
            Configuration::updateValue(Stripe_official::ASK_CUSTOMER, Tools::getValue('ask_customer'), false, $shopGroupId, $shopId);
        }

        return true;
    }

    /*
        Input : 'status', 'id_payment_intent', 'token', 'paymentIntent'
        Output : 'source', 'secure_key', 'result'
    */
    public function registerOtherConfigurations()
    {
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();
        Configuration::updateValue(Stripe_official::ENABLE_IDEAL, Tools::getValue('ideal'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_SOFORT, Tools::getValue('sofort'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_GIROPAY, Tools::getValue('giropay'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_BANCONTACT, Tools::getValue('bancontact'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_FPX, Tools::getValue('fpx'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_EPS, Tools::getValue('eps'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_P24, Tools::getValue('p24'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_SEPA, Tools::getValue('sepa_debit'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_ALIPAY, Tools::getValue('alipay'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_OXXO, Tools::getValue('oxxo'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_APPLEPAY_GOOGLEPAY, Tools::getValue('applepay_googlepay'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::POSTCODE, Tools::getValue('postcode'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::CARDHOLDERNAME, Tools::getValue('cardholdername'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::REINSURANCE, Tools::getValue('reinsurance'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::VISA, Tools::getValue('visa'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::MASTERCARD, Tools::getValue('mastercard'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::AMERICAN_EXPRESS, Tools::getValue('american_express'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::CB, Tools::getValue('cb'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::DINERS_CLUB, Tools::getValue('diners_club'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::UNION_PAY, Tools::getValue('union_pay'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::JCB, Tools::getValue('jcb'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::DISCOVERS, Tools::getValue('discovers'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_PAYMENT_ELEMENTS, Tools::getValue('payment_element'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_KLARNA, Tools::getValue('klarna'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_AFTERPAY, Tools::getValue('afterpay_clearpay'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_AFFIRM, Tools::getValue('affirm'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::ENABLE_LINK, Tools::getValue('link'), false, $shopGroupId, $shopId);
        Configuration::updateValue(Stripe_official::THEME, Tools::getValue('stripe_theme'), false, $shopGroupId, $shopId);

        if (!count($this->module->errors)) {
            $this->module->success = $this->module->l('Settings updated successfully.');
        }

        return true;
    }

    public function registerApplePayDomain()
    {
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();
        if (Configuration::get(Stripe_official::KEY, null, $shopGroupId, $shopId) && '' != Configuration::get(Stripe_official::KEY, null, $shopGroupId, $shopId)) {
            $this->module->addAppleDomainAssociation(Configuration::get(Stripe_official::KEY, null, $shopGroupId, $shopId));
        }

        return true;
    }

    public function registerWebhookSignature()
    {
        $this->context = $this->conveyor['context'];
        $shopGroupId = Stripe_official::getShopGroupIdContext();
        $shopId = Stripe_official::getShopIdContext();
        $webhookSignature = Configuration::get(Stripe_official::WEBHOOK_SIGNATURE, null, $shopGroupId, $shopId);
        $webhookId = Configuration::get(Stripe_official::WEBHOOK_ID, null, $shopGroupId, $shopId);
        $webhookConfError = false;

        /* Check if webhook_id and webhook_signature have been defined */
        if (!$webhookSignature || '' == $webhookSignature || !$webhookId || '' == $webhookId) {
            $webhookConfError = true;
        } else {
            /* Check if webhook access is write */
            try {
                $webhookEndpoint = \Stripe\WebhookEndpoint::retrieve($webhookId);
                $webhookUrlExpected = Stripe_official::getWebhookUrl();
                $webhookUpdateData = [];

                /* Check if webhook configuration is wrong */
                if ($webhookEndpoint->url != $webhookUrlExpected) {
                    $webhookUpdateData['url'] = $webhookUrlExpected;
                }
                /* Check if webhook events are wrong */
                $eventError = false;
                if (count($webhookEndpoint->enabled_events) == count(Stripe_official::$webhook_events)) {
                    foreach ($webhookEndpoint->enabled_events as $webhookEvent) {
                        if (!in_array($webhookEvent, Stripe_official::$webhook_events)) {
                            $eventError = true;
                        }
                    }
                } else {
                    $eventError = true;
                }
                if ($eventError) {
                    $webhookUpdateData['enabled_events'] = Stripe_official::$webhook_events;
                }

                if (!empty($webhookUpdateData)) {
                    $secretKey = Configuration::get(Stripe_official::MODE, null, $shopGroupId, $shopId) ? Configuration::get(Stripe_official::TEST_KEY, null, $shopGroupId, $shopId) : Configuration::get(Stripe_official::KEY, null, $shopGroupId, $shopId);
                    $stripeClient = new \Stripe\StripeClient($secretKey);
                    $stripeClient->webhookEndpoints->update($webhookId, $webhookUpdateData);
                }
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $webhookConfError = true;
            }
        }

        if ($webhookConfError && StripeWebhook::countWebhooksList() < 16) {
            $webhooksList = StripeWebhook::getWebhookList();

            foreach ($webhooksList as $webhookEndpoint) {
                if ($webhookEndpoint->url == Stripe_official::getWebhookUrl()) {
                    $webhookEndpoint->delete();
                }
            }

            StripeWebhook::create();
        }

        return true;
    }
}
