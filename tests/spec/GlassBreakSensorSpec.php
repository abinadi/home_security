<?php

namespace spec\Security;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\AbstractSensor;
use Security\GlassBreakSensor;
use Security\Sensor;
use stdClass;

/**
 * Class GlassBreakSensorSpec
 * @package spec\Security
 * @mixin \Security\GlassBreakSensor
 */
class GlassBreakSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('A Door');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(GlassBreakSensor::class);
        $this->shouldHaveType(AbstractSensor::class);
        $this->shouldImplement(Sensor::class);
    }

    public function it_has_a_glass_break_type()
    {
        $this->getType()->shouldReturn('GlassBreak');
    }

    public function it_can_sense_glass_breaking()
    {
        $this->getState()->shouldReturn('0hz');
        $this->listen(450.4);
        $this->getState()->shouldReturn('450.4hz');
        $this->listen(955);
        $this->getState()->shouldReturn('955hz');
    }

    public function it_only_handles_numeric_hertz_quantities()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringListen('apple');
        $this->shouldThrow('\InvalidArgumentException')->duringListen('100');
        $this->shouldThrow('\InvalidArgumentException')->duringListen('10abc');
        $this->shouldThrow('\InvalidArgumentException')->duringListen(new stdClass());
    }
    
    public function it_signals_alarm_when_glass_breaking_sound()
    {
        $this->listen(450);
        $this->alarm()->shouldReturn(true);
        
        $this->listen(449);
        $this->alarm()->shouldReturn(false);
    }
}
