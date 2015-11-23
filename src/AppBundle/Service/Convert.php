<?php

namespace AppBundle\Service;

use AppBundle\Service\Converter\ConvertHandler;

class Convert
{
    private $formats = ['xml', 'json'];
    private  $handler;
    public function __construct(ConvertHandler $handler)
    {
        $this->handler = $handler;
    }

    public function convert(array $data, $format)
    {
        if (!in_array($format, $this->formats)) {
            throw new \Exception();
        }

        $converter = $this->handler->getConverter($format);

        return $converter->convert($data);
    }
}
