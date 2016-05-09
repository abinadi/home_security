<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractTemperatureSensor;
use Security\Sensor\FireTemperatureSensor;
use Security\Sensor\Sensor;

/**
 * Class FireTemperatureSensorSpec
 * @package spec\Security
 * @mixin FireTemperatureSensor
 */
class FireTemperatureSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Fire');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FireTemperatureSensor::class);
        $this->shouldHaveType(AbstractTemperatureSensor::class);
        $this->shouldImplement(Sensor::class);
    }

    public function it_has_a_type()
    {
        $this->getType()->shouldReturn('Fire');
    }

    public function it_knows_when_to_signal_alarm()
    {
        $this->detect(120);
        $this->alarm()->shouldReturn(true);
        
        $this->detect(119);
        $this->alarm()->shouldReturn(false);
    }

    public function it_can_detect_random_for_demo()
    {
        $this->detectRandom();
    }
}
