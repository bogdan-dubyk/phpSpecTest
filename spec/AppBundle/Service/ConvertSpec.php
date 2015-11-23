<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\Converter\ConvertHandler;
use AppBundle\Service\Converter\XmlConverter;
use AppBundle\Service\Converter\ConverterInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConvertSpec extends ObjectBehavior
{
    function let(ConvertHandler $handler, ConverterInterface $converter)
    {
        $handler->getConverter(Argument::any('string'))->willReturn($converter);
        $this->beConstructedWith($handler);
    }

    function it_sholud_convert_to_xml(ConvertHandler $handler)
    {
        $xmlConverter = new XmlConverter();
        $handler->getConverter('xml')->willReturn($xmlConverter);
        $this->convert(['test'=> 'test'], 'xml')->shouldBeString();
        $handler->getConverter('xml')->shouldBeCalled();
    }

    function  its_convert_should_be_valid()
    {
        $this->shouldThrow('Exception')->during('convert', ['not_array', 'xml']);
        $this->shouldThrow('Exception')->during('convert', [[], 'bad_format']);
    }
}
