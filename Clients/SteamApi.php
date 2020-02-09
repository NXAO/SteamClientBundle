<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Clients;

/**
 * @Url("http://api.steampowered.com")
 */
interface SteamApi
{
    /**
     * @GET("/ISteamApps/GetAppList/v2")
     */
    public function appList();
}
