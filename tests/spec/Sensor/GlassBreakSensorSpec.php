<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractSensor;
use Security\Sensor\GlassBreakSensor;
use Security\Sensor\Sensor;
use stdClass;

/**
 * Class GlassBreakSensorSpec
 * @package spec\Security
 * @mixin GlassBreakSensor
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
        $this->detect(450.4);
        $this->getState()->shouldReturn('450.4hz');
        $this->detect(955);
        $this->getState()->shouldReturn('955hz');
    }

    public function it_only_handles_numeric_hertz_quantities()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringDetect('apple');
        $this->shouldThrow('\InvalidArgumentException')->duringDetect('100');
        $this->shouldThrow('\InvalidArgumentException')->duringDetect('10abc');
        $this->shouldThrow('\InvalidArgumentException')->duringDetect(new stdClass());
    }
    
    public function it_signals_alarm_when_glass_breaking_sound()
    {
        $this->detect(557);
        $this->alarm()->shouldReturn(true);
        
        $this->detect(449);
        $this->alarm()->shouldReturn(false);
    }

    public function it_can_detect_random_for_the_demo()
    {
        $this->detectRandom();
    }
}
