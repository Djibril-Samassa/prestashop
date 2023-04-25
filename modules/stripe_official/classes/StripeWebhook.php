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

use Stripe_officialClasslib\Extensions\ProcessLogger\ProcessLoggerHandler;

class StripeWebhook extends ObjectModel
{
    public static function create()
    {
        try {
            $shopGroupId = Stripe_official::getShopGroupIdContext();
            $shopId = Stripe_official::getShopIdContext();

            $stripeAccount = \Stripe\Account::retrieve();
            $webhookEndpoint = \Stripe\WebhookEndpoint::create([
                'url' => Stripe_official::getWebhookUrl(),
                'enabled_events' => Stripe_official::$webhook_events,
            ]);

            Configuration::updateValue(Stripe_official::WEBHOOK_SIGNATURE, $webhookEndpoint->secret, false, $shopGroupId, $shopId);
            Configuration::updateValue(Stripe_official::WEBHOOK_ID, $webhookEndpoint->id, false, $shopGroupId, $shopId);
            Configuration::updateValue(Stripe_official::ACCOUNT_ID, $stripeAccount->id, false, $shopGroupId, $shopId);

            return true;
        } catch (Exception $e) {
            ProcessLoggerHandler::logError(
                'Create webhook endpoint - ' . (string) $e->getMessage(),
                null,
                null,
                'StripeWebhook'
            );

            return false;
        }
    }

    public static function getWebhookList()
    {
        try {
            return \Stripe\WebhookEndpoint::all(
                [
                    'limit' => 16,
                ]
            );
        } catch (Exception $e) {
            ProcessLoggerHandler::logError(
                'getWebhookList - ' . (string) $e->getMessage(),
                null,
                null,
                'StripeWebhook'
            );

            return false;
        }
    }

    public static function countWebhooksList()
    {
        $list = self::getWebhookList();

        return (isset($list->data) && $list->data) ? count($list->data) : 0;
    }

    public static function webhookCanBeRegistered()
    {
        $context = Context::getContext();

        if (false === Stripe_official::isWellConfigured()) {
            return false;
        }

        $webhooksList = self::getWebhookList();
        $webhookUrl = Stripe_official::getWebhookUrl();
        $webhookExists = false;

        foreach ($webhooksList->data as $webhook) {
            if ($webhook->url == $webhookUrl) {
                $webhookExists = true;
                break;
            }
        }

        if (self::countWebhooksList() >= 16 && false === $webhookExists) {
            return false;
        }

        return true;
    }
}
