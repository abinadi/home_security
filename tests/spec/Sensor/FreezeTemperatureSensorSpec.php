<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractTemperatureSensor;
use Security\Sensor\FreezeTemperatureSensor;
use Security\Sensor\Sensor;

/**
 * Class FreezeTemperatureSensorSpec
 * @package spec\Security
 * @mixin FreezeTemperatureSensor
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
        $this->detect(32);
        $this->alarm()->shouldReturn(true);

        $this->detect(33);
        $this->alarm()->shouldReturn(false);
    }

    public function it_can_detect_random_for_demo()
    {
        $this->detectRandom();
    }
}
