<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\DependencyInjection;

use Nxao\Component\SteamClient\AnnotationHandlers\AnnotationHandlerInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NxaoSteamClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->addAnnotatedClassesToCompile([
            '**\\Clients\\',
        ]);

        $container->registerForAutoconfiguration(AnnotationHandlerInterface::class)
            ->addTag('nxao.steam_client.annotation_handlers');
    }
}
