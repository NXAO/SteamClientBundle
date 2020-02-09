<?php

declare(strict_types=1);

namespace Nxao\Component\SteamClient\Service;

use Doctrine\Common\Annotations\AnnotationReader;

class ClientReader
{
    private AnnotationReader $annotationReader;

    public function __construct(AnnotationReader $annotationReader)
    {
        $this->annotationReader = $annotationReader;
    }

    public function getClassAnnotations()
    {

        return;
    }
}
