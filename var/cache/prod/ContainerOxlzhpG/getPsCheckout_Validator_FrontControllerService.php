<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'ps_checkout.validator.front_controller' shared service.

return $this->services['ps_checkout.validator.front_controller'] = new \PrestaShop\Module\PrestashopCheckout\Validator\FrontControllerValidator(($this->services['ps_checkout.validator.merchant'] ?? $this->load('getPsCheckout_Validator_MerchantService.php')), ($this->services['ps_checkout.express_checkout.configuration'] ?? $this->load('getPsCheckout_ExpressCheckout_ConfigurationService.php')), ($this->services['ps_checkout.pay_later.configuration'] ?? $this->load('getPsCheckout_PayLater_ConfigurationService.php')));
