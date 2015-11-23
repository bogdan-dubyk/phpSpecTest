<?php

namespace spec\AppBundle\Controller;

use AppBundle\Service\Convert;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerSpec extends ObjectBehavior
{
    function let(ContainerInterface $container, EngineInterface $templating, Convert $convert)
    {
        $this->setContainer($container);
        $container->get('app_converter')->willReturn($convert);
        $container->get('templating')->willReturn($templating);
    }
    function it_should_return_converted_data(Request $request, Convert $convert, EngineInterface $templating)
    {
        $result  = $this->indexAction($request);
        $convert->convert(Argument::any([]), Argument::any('string'))->shouldBeCalled();
        $convert->convert(Argument::any([]), Argument::any('string'))->willReturn('string');
        $templating->render('default/index.html.twig', array('result' => $result));
    }
}
