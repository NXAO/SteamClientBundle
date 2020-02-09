<?php

declare(strict_types=1);

namespace Nxao\Component\SteamParser;

use Nxao\Component\SteamParser\DependencyInjection\Compiler\WriterRegistryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NxaoSteamParserBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new WriterRegistryPass());
    }
}
