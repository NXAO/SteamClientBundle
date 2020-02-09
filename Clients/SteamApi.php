<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Clients;

use Nxao\Component\SteamClient\Annotations\{Get,Url};

/**
 * @Url("http://api.steampowered.com")
 */
interface SteamApi
{
    /**
     * @Get("/ISteamApps/GetAppList/v2")
     */
    public function appList();
}
