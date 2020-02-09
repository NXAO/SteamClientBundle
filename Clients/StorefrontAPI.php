<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Clients;

/**
 * @Url("https://store.steampowered.com/api")
 */
interface StorefrontAPI
{
    /**
     * @GET("/appdetails")
     * @Query("appids")
     */
    public function appDetails(int $appids): Call;
}
