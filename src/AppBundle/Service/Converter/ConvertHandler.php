<?php

namespace AppBundle\Service\Converter;

class ConvertHandler
{
    public function getConverter($format)
    {
        $class = "AppBundle\Service\Converter\\".ucfirst($format).'Converter';
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new \Exception('No such converter');
        }
    }
}
