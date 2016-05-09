<?php
namespace Security\Sensor;

use Faker;

class GlassBreakSensor extends AbstractSensor implements Sensor
{
    /**
     * @var float
     */
    protected $level;

    /**
     * GlassBreakSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->detect(0.0);
        $this->setType('GlassBreak');
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->level . 'hz';
    }

    /**
     * @param mixed $level
     */
    public function detect($level)
    {
        if ( ! (is_int($level) || is_float($level))) {
            throw new \InvalidArgumentException();
        }
        
        $this->level = $level;
    }

    public function detectRandom()
    {
        $faker = Faker\Factory::create();
        
        $this->detect($faker->numberBetween(0,1000));
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->level >= 556) {
            return true;
        }
        
        return false;
    }
}
