<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'ps_checkout.paypal.configuration' shared service.

return $this->services['ps_checkout.paypal.configuration'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalConfiguration(($this->services['ps_checkout.configuration'] ?? $this->load('getPsCheckout_ConfigurationService.php')), ($this->services['ps_checkout.repository.paypal.code'] ?? ($this->services['ps_checkout.repository.paypal.code'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository())));
