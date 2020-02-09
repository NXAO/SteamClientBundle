<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient;

use Nxao\Component\SteamClient\DependencyInjection\Compiler\WriterRegistryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NxaoSteamClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new WriterRegistryPass());
    }
}
