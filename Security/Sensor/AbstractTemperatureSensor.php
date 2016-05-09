<?php
namespace Security\Sensor;

use InvalidArgumentException;

abstract class AbstractTemperatureSensor extends AbstractSensor implements Sensor
{
    /**
     * @var float
     */
    protected $temp;

    /**
     * AbstractTemperatureSensor constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->detect(0);
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->temp . ' Degrees';
    }

    /**
     * @param float $temp
     */
    public function detect($temp)
    {
        if ( ! (is_int($temp) || is_float($temp))) {
            throw new InvalidArgumentException('Temp must be a number.');
        }
        
        $this->temp = $temp;
    }

    /**
     * @return bool
     */
    abstract public function alarm();
}
