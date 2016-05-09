<?php

namespace spec\Security;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\AbstractTemperatureSensor;
use Security\FreezeTemperatureSensor;
use Security\Sensor;

/**
 * Class FreezeTemperatureSensorSpec
 * @package spec\Security
 * @mixin \Security\FreezeTemperatureSensor
 */
class FreezeTemperatureSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Freeze');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FreezeTemperatureSensor::class);
        $this->shouldHaveType(AbstractTemperatureSensor::class);
        $this->shouldImplement(Sensor::class);
    }
    
    public function it_has_a_type()
    {
        $this->getType()->shouldReturn('Freeze');
    }

    public function it_knows_when_to_signal_alarm()
    {
        $this->setTemperature(32);
        $this->alarm()->shouldReturn(true);

        $this->setTemperature(33);
        $this->alarm()->shouldReturn(false);
    }
}
