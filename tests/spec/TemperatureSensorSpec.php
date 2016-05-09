<?php

namespace spec\Security;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class TemperatureSensorSpec
 * @package spec\Security
 * @mixin \Security\TemperatureSensor
 */
class TemperatureSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Temp', 'Fire');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Security\TemperatureSensor');
        $this->shouldImplement('Security\Sensor');
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('Temp');
        $this->setName('Kitchen Temperature');
        $this->getName()->shouldReturn('Kitchen Temperature');
    }

    public function it_has_only_two_types()
    {
        $this->setType('Fire');
        $this->getType()->shouldReturn('Fire');
        $this->setType('Freeze');
        $this->getType()->shouldReturn('Freeze');
        $this->shouldThrow('\InvalidArgumentException')->duringSetType('Other');
    }

    public function it_has_a_state()
    {
        $this->getState()->shouldReturn('0 Degrees');
    }

    public function it_can_detect_temperature()
    {
        $this->setTemperature(70.6);
        $this->getState()->shouldReturn('70.6 Degrees');
        $this->getTemperature()->shouldReturn('70.6 Degrees');
    }

    public function it_knows_when_to_signal_an_alarm()
    {
        // Fire alarm when temp is >= 120
        $this->setType('Fire');
        $this->setTemperature(120);
        $this->alarm()->shouldReturn(true);
        $this->setTemperature(119);
        $this->alarm()->shouldReturn(false);
        
        // Freeze alarm when temp is <= 32
        $this->setType('Freeze');
        $this->setTemperature(33);
        $this->alarm()->shouldReturn(false);
        $this->setTemperature(32);
        $this->alarm()->shouldReturn(true);
    }
}
