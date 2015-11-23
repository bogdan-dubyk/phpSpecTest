<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 21.11.15
 * Time: 16:29
 */

namespace AppBundle\Service\Converter;


interface ConverterInterface
{
    public function convert(array $data);
}