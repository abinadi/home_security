<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractSensorStub;

/**
 * Class AbstractSensorStubSpec
 * @package spec\Security
 * @mixin \Security\Sensor\AbstractSensorStub
 */
class AbstractSensorStubSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AbstractSensorStub::class);
    }
    
    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('Name');
        $this->setName('Abstract Stub');
        $this->getName()->shouldReturn('Abstract Stub');
    }

}
