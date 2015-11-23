<?php

namespace spec\AppBundle\Service\Converter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\SimpleXMLElement;

class XmlConverterSpec extends ObjectBehavior
{
    function it_should_implement()
    {
        $this->shouldImplement('AppBundle\Service\Converter\ConverterInterface');
    }

    function it_should_convert()
    {
        $this->convert(['test'=>'test'])->shouldBeString();
        $this->convert(['test'=>'test'])->shouldReturn(
            '<?xml version="1.0" encoding="utf-8"?><root><test>test</test></root>'
            );
    }
}
