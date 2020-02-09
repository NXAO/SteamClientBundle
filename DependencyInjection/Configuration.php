<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('steam_clients');

        $treeBuilder->getRootNode()

            ->end()
        ;

        return $treeBuilder;
    }
}
