<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

class WriterRegistryPass implements CompilerPassInterface
{
    private string $handlerTag;

    public function __construct(string $handlerTag = 'messenger.message_handler')
    {
        $this->handlerTag = $handlerTag;
    }

    public function process(ContainerBuilder $container)
    {
        $this->registerHandlers($container);
    }

    private function registerHandlers(ContainerBuilder $container): void
    {
        foreach ($container->findTaggedServiceIds($this->handlerTag, true) as $serviceId => $tags) {
            foreach ($tags as $tag) {
                $className = $container->getDefinition($serviceId)->getClass();
                $r = $container->getReflectionClass($className);

                if (null === $r) {
                    throw new RuntimeException(sprintf('Invalid service "%s": class "%s" does not exist.', $serviceId, $className));
                }
            }
        }
    }
}
