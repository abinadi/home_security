<?php

namespace spec\Security\Sensor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\AbstractSensor;
use Security\Sensor\Sensor;
use Security\Sensor\SmokeDetectorSensor;
use stdClass;

/**
 * Class SmokeDetectorSensorSpec
 * @package spec\Security
 * @mixin SmokeDetectorSensor
 */
class SmokeDetectorSensorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Smoke Detector');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SmokeDetectorSensor::class);
        $this->shouldHaveType(AbstractSensor::class);
        $this->shouldImplement(Sensor::class);
    }

    public function it_has_a_smoke_detector_type()
    {
        $this->getType()->shouldReturn('Smoke');
    }

    public function it_can_determine_visibility()
    {
        $this->getState()->shouldReturn('100% Visibility');
        $this->detect(75);
        $this->getState()->shouldReturn('75% Visibility');
    }

    public function it_only_handles_visibility_percentage()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect('Foo');
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect('90');
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(new stdClass());
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(101);
        $this->shouldThrow('\InvalidArgumentException')
            ->duringDetect(-1);
    }

    public function it_signals_alarm_if_visibility_too_low()
    {
        $this->detect(75);
        $this->alarm()->shouldReturn(false);
        
        $this->detect(74);
        $this->alarm()->shouldReturn(true);
    }

    public function it_can_detect_random_for_the_demo()
    {
        $this->detectRandom();
    }
}
