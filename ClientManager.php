<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient;

use Doctrine\Common\Annotations\AnnotationReader;
use Nxao\Component\SteamClient\Service\ClientReader;

class ClientManager
{
    private ClientReader $clientReader;

    public function __construct(ClientReader $clientReader)
    {
        $this->annotationReader = $clientReader;
    }

    public function execute(string $service)
    {
        $this->annotationReader->getClassAnnotations();
    }
}
