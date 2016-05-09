<?php
namespace Security\Sensor;

use Faker;

class FreezeTemperatureSensor extends AbstractTemperatureSensor
{
    public function __construct($name)
    {
        parent::__construct($name);

        $this->setType('Freeze');
        $this->detect(50); // Don't default to an alarm temperature
    }

    public function detectRandom()
    {
        $faker = Faker\Factory::create();
        
        $this->detect($faker->numberBetween(-10,100)); 
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->temp <= 32) {
            return true;
        }

        return false;
    }
}
