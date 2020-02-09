<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient;

use Nxao\Component\SteamClient\Service\ClientReader;

class ClientManager
{
    private ClientReader $clientReader;

    public function __construct(ClientReader $clientReader)
    {
        $this->clientReader = $clientReader;
    }

    public function execute(string $service)
    {
        $this->clientReader->getClassAnnotations($service);
    }
}
