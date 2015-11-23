<?php

namespace spec\AppBundle\Service\Converter;

use AppBundle\Service\Converter\XmlConverter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConvertHandlerSpec extends ObjectBehavior
{
    function it_should_return_xml_converter()
    {
        $this->getConverter('xml')->shouldReturnAnInstanceOf('AppBundle\Service\Converter\XmlConverter');
    }

    function its_get_converter_shouldBe_valid()
    {
        $this->shouldThrow(new \Exception('No such converter'))->during('getConverter', ['wrong_format']);
    }
}
