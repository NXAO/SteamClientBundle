<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Tests;

use Nxao\Component\SteamClient\ClientManager;
use Nxao\Component\SteamClient\Clients\SteamApi;
use PHPUnit\Framework\TestCase;

class ClientManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
    public $clientManager;

    protected function setUp(): void
    {
        parent::setUp();

        static::bootKernel();
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
