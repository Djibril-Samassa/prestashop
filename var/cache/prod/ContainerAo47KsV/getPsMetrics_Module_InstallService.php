<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'ps_metrics.module.install' shared service.

return $this->services['ps_metrics.module.install'] = new \PrestaShop\Module\Ps_metrics\Module\Install(($this->services['ps_metrics.module'] ?? $this->load('getPsMetrics_ModuleService.php')), ($this->services['ps_metrics.repository.configuration'] ?? $this->load('getPsMetrics_Repository_ConfigurationService.php')), ($this->services['ps_metrics.repository.hookmodule'] ?? ($this->services['ps_metrics.repository.hookmodule'] = new \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository())));
