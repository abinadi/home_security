<?php

namespace Security\Sensor;

use Faker;

class DualTemperatureSensor extends AbstractTemperatureSensor
{
    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->setType('Dual');
    }

    /**
     * @return void
     */
    public function detectRandom()
    {
        $faker = Faker\Factory::create();

        $this->detect($faker->numberBetween(-10,180));
    }

    /**
     * Alarm if anywhere outside the range of 32 - 100 degrees
     * @return bool
     */
    public function alarm()
    {
        if ($this->temp <= 32 || $this->temp >= 120) {
            return true;
        }
        
        return false;
    }
}
