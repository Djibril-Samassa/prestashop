<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'mbo.addons.user.provider' shared service.

return $this->services['mbo.addons.user.provider'] = new \PrestaShop\Module\Mbo\Addons\User\AddonsUserProvider(($this->services['mbo.addons.user'] ?? $this->load('getMbo_Addons_UserService.php')));
