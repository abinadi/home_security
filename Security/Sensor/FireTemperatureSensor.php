<?php
namespace Security\Sensor;

use Faker;

class FireTemperatureSensor extends AbstractTemperatureSensor 
{
    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->setType('Fire');
    }

    public function detectRandom()
    {
        $faker = Faker\Factory::create();
        
        $this->detect($faker->numberBetween(70,180));
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->temp >= 120) {
            return true;
        }
        
        return false;
    }
}
