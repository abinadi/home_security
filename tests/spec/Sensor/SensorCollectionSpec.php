<?php

namespace spec\Security\Sensor;

use Iterator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Security\Sensor\FireTemperatureSensor;
use Security\Sensor\GlassBreakSensor;
use Security\Sensor\Sensor;
use Security\Sensor\SensorCollection;
use Security\Sensor\SmokeDetectorSensor;

/**
 * Class SensorCollectionSpec
 * @package spec\Security\Sensor
 * @mixin \Security\Sensor\SensorCollection
 */
class SensorCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SensorCollection::class);
        $this->shouldImplement(Iterator::class);
        $this->shouldImplement(\Countable::class);
    }

    public function it_can_initialize_with_an_array_of_sensors(Sensor $sensor1, Sensor $sensor2)
    {
        $this->beConstructedWith([$sensor1, $sensor2]);

        $this->count()->shouldReturn(2);
    }

    public function it_can_only_be_constructed_with_sensors()
    {
        $this->shouldThrow('\InvalidArgumentException')
            ->during('__construct', [[1, 2]]);
    }

    public function it_can_add_more_sensors(Sensor $sensor1, Sensor $sensor2)
    {
        $this->add($sensor1);
        $this->add($sensor2);
        $this->count()->shouldReturn(2);
    }

    public function it_can_randomize(FireTemperatureSensor $fire,
                                     GlassBreakSensor $glass,
                                     SmokeDetectorSensor $smoke)
    {
        $this->beConstructedWith([$fire, $glass, $smoke]);
      
        $this->randomize();
    }
}
