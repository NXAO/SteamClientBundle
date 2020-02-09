<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Annotations;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class Query
{
    public function __construct(array $values)
    {

    }
}
