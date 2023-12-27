<?php

declare(strict_types=1);

use Jose\Component\KeyManagement\JWKFactory;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $container): void {
    $container = $container->services()
        ->defaults()
        ->private()
        ->autoconfigure()
        ->autowire();

    $container->set(JWKFactory::class)
        ->public();
};
