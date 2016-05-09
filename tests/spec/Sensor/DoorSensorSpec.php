<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractSensor;
use Security\Sensor\DoorSensor;
use Security\Sensor\Sensor;

/**
 * Class DoorSensorSpec
 * @package spec\Security
 * @mixin DoorSensor
 */
class DoorSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('A Door');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DoorSensor::class);
        $this->shouldHaveType(AbstractSensor::class);
        $this->shouldImplement(Sensor::class);
    }

    public function it_has_a_door_type()
    {
        $this->getType()->shouldReturn('Door');
    }

    public function it_can_sense_state_of_the_door()
    {
        $this->getState()->shouldReturn('Closed');
        $this->detect('Open');
        $this->getState()->shouldReturn('Open');
    }
    
    public function it_only_handles_actual_door_states()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect('Ajar');

        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(123);
    }

    public function it_signals_alarm_if_door_is_open()
    {
        $this->detect('Open');
        $this->alarm()->shouldReturn(true);
        
        $this->detect('Closed');
        $this->alarm()->shouldReturn(false);
    }
}
