<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAo47KsV\appAppKernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAo47KsV/appAppKernelProdContainer.php') {
    touch(__DIR__.'/ContainerAo47KsV.legacy');

    return;
}

if (!\class_exists(appAppKernelProdContainer::class, false)) {
    \class_alias(\ContainerAo47KsV\appAppKernelProdContainer::class, appAppKernelProdContainer::class, false);
}

return new \ContainerAo47KsV\appAppKernelProdContainer([
    'container.build_hash' => 'Ao47KsV',
    'container.build_id' => '700023e6',
    'container.build_time' => 1682348161,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAo47KsV');