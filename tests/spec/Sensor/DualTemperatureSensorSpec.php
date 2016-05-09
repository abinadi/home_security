<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractTemperatureSensor;
use Security\Sensor\DualTemperatureSensor;
use Security\Sensor\Sensor;

/**
 * Class DualTemperatureSensorSpec
 * @package spec\Security\Sensor
 * @mixin \Security\Sensor\DualTemperatureSensor
 */
class DualTemperatureSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Dual');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DualTemperatureSensor::class);
        $this->shouldHaveType(AbstractTemperatureSensor::class);
        $this->shouldImplement(Sensor::class);
    }

    public function it_has_a_type()
    {
        $this->getType()->shouldReturn('Dual');
    }

    public function it_knows_when_to_signal_an_alarm()
    {
        $this->detect(30);
        $this->alarm()->shouldReturn(true);
        
        $this->detect(34);
        $this->alarm()->shouldReturn(false);
        
        $this->detect(119);
        $this->alarm()->shouldReturn(false);
        
        $this->detect(120);
        $this->alarm()->shouldReturn(true);
    }

    public function it_can_detect_random_for_the_demo()
    {
        $this->detectRandom();
    }
}
