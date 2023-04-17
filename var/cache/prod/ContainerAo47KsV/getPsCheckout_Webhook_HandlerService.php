<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'ps_checkout.webhook.handler' shared service.

return $this->services['ps_checkout.webhook.handler'] = new \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookHandler(($this->services['ps_checkout.webhook.service.secret_token'] ?? $this->load('getPsCheckout_Webhook_Service_SecretTokenService.php')), [0 => ($this->services['ps_checkout.webhook.handler.event.configuration_updated'] ?? $this->load('getPsCheckout_Webhook_Handler_Event_ConfigurationUpdatedService.php'))]);
