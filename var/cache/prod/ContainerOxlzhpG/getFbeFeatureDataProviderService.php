<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'PrestaShop\Module\PrestashopFacebook\Provider\FbeFeatureDataProvider' shared service.

return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\FbeFeatureDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\FbeFeatureDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] ?? $this->load('getFacebookClientService.php')), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->load('getConfigurationAdapterService.php')));
