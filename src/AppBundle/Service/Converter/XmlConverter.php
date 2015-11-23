<?php

namespace AppBundle\Service\Converter;

use mjohnson\utility\TypeConverter;

class XmlConverter implements ConverterInterface
{
    public function convert(array $data)
    {
        return str_replace(PHP_EOL, '', TypeConverter::toXml($data));
    }
}
