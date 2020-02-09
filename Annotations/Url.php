<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Annotations;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
class Url
{
    public string $url;

    public function __construct(array $values)
    {
        $this->url = $values['value'];
    }
}
