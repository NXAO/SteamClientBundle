<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Tests;

use Doctrine\Common\Annotations\AnnotationReader;
use Nxao\Component\SteamClient\ClientManager;
use Nxao\Component\SteamClient\Clients\SteamApi;
use Nxao\Component\SteamClient\Service\ClientReader;
use PHPUnit\Framework\TestCase;

class ClientManagerTest extends TestCase
{
    public $clientManager;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clientManager = new \Nxao\Component\SteamClient\ClientManager(new ClientReader(new AnnotationReader()));
    }

    protected function tearDown(): void
    {
        $this->clientManager = null;
    }

    public function testExecude(){
        $this->clientManager->execute(SteamApi::class);
        $this->assertEmpty([]);
    }
}
