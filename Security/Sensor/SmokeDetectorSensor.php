<?php
namespace Security\Sensor;

use Faker;

class SmokeDetectorSensor extends AbstractSensor implements Sensor
{
    /**
     * @var float
     */
    protected $visibility;

    /**
     * SmokeDetectorSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->detect(100);
        $this->setType('Smoke');
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->visibility . '% Visibility';
    }

    /**
     * @param float $visibility
     * @return void
     */
    public function detect($visibility)
    {
        // Throw exception if not a number or outside of range 0-100
        if (!(is_int($visibility) || is_float($visibility))
            || $visibility < 0
            || $visibility > 100
        ) {
            throw new \InvalidArgumentException('Only numbers between 0 and 100 are allowed.');
        }
        
        $this->visibility = $visibility;
    }

    public function detectRandom()
    {
        $faker = Faker\Factory::create();
        
        $this->detect($faker->numberBetween(0,100));
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->visibility < 75) {
            return true;
        }
        
        return false;
    }
}
