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

    public function getAnnotations(string $class): array 
    {
        $methodAnnotations = [];
        $reflClass = new \ReflectionClass($class);

        $classAnnotations = $this->annotationReader->getClassAnnotations($reflClass);

        foreach ($reflClass->getMethods() as $method) {
            $anotations = $this->annotationReader->getMethodAnnotations($method);

            if(!$methodAnnotations){
                $methodAnnotations = $anotations;
            }else {
                $methodAnnotations = [$methodAnnotations, ...$anotations];
            }
        }


        return [$classAnnotations, $methodAnnotations];
    }
}
