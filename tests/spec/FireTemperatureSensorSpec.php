<?php

namespace spec\Security;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\AbstractTemperatureSensor;
use Security\FireTemperatureSensor;
use Security\Sensor;

/**
 * Class FireTemperatureSensorSpec
 * @package spec\Security
 * @mixin \Security\FireTemperatureSensor
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
        $this->setTemperature(120);
        $this->alarm()->shouldReturn(true);
        
        $this->setTemperature(119);
        $this->alarm()->shouldReturn(false);
    }
}
