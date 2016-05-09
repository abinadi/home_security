<?php

namespace Security\Sensor;

use Countable;
use Faker;
use InvalidArgumentException;
use Iterator;

class SensorCollection implements Iterator, Countable
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var array
     */
    protected $collection = [];


    public function __construct($sensors = [])
    {
        foreach($sensors as $sensor) {
            if( ! $sensor instanceof Sensor) {
                throw new InvalidArgumentException('Can only accept Sensors');
            }
            
            $this->add($sensor);
        }
    }

    /**
     * @param Sensor $sensor
     */
    public function add(Sensor $sensor)
    {
        $this->collection[] = $sensor;
    }

    /**
     * Even better would be to have each sensor have a randomize method
     */
    public function randomize()
    {
        $faker = Faker\Factory::create();
        
        foreach($this->collection as $index => $sensor) {
            if ($sensor instanceof FireTemperatureSensor) {
                $this->collection[$index]->detect($faker->numberBetween(70,180));
            }

            if ($sensor instanceof FreezeTemperatureSensor) {
                $this->collection[$index]->detect($faker->numberBetween(-10,100)); 
            }
            
            if ($sensor instanceof DoorSensor) {
                $this->collection[$index]->detect($faker->randomElement(['Open', 'Closed']));
            }
            
            if ($sensor instanceof GlassBreakSensor) {
                $this->collection[$index]->detect($faker->numberBetween(0,1000));
            }
            
            if ($sensor instanceof SmokeDetectorSensor) {
                $this->collection[$index]->detect($faker->numberBetween(0,100));
            }
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->collection[$this->position];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset($this->collection[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->collection);
    }
}
