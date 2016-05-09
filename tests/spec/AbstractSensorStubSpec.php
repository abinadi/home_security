<?php

namespace spec\Security;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AbstractSensorStubSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Security\AbstractSensorStub');
    }
    
    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('Name');
        $this->setName('Abstract Stub');
        $this->getName()->shouldReturn('Abstract Stub');
    }

}
