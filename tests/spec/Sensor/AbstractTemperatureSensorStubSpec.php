<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractSensor;
use Security\Sensor\AbstractTemperatureSensorStub;
use stdClass;

/**
 * Class AbstractTemperatureSensorStubSpec
 * @package spec\Security
 * @mixin AbstractTemperatureSensorStub
 */
class AbstractTemperatureSensorStubSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Temp');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(AbstractTemperatureSensorStub::class);
        $this->shouldHaveType(AbstractSensor::class);
    }

    public function it_has_a_state()
    {
        $this->getState()->shouldReturn('0 Degrees');
    }

    public function it_can_detect_temperature()
    {
        $this->detect(70.6);
        $this->getState()->shouldReturn('70.6 Degrees');
    }

    public function it_only_handles_actual_temperatures()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect('100');
        
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(new stdClass());

        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(null);
    }

}
