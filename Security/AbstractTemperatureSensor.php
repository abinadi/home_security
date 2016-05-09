<?php
namespace Security;

use InvalidArgumentException;

abstract class AbstractTemperatureSensor extends AbstractSensor implements Sensor
{
    /**
     * @var float
     */
    protected $temp;

    /**
     * @var string
     */
    protected $type;

    /**
     * AbstractTemperatureSensor constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->temp = 0;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->getTemperature();
    }

    /**
     * @return string
     */
    public function getTemperature()
    {
        return $this->temp . ' Degrees';
    }

    /**
     * @param float $temp
     */
    public function setTemperature($temp)
    {
        if ( ! (is_int($temp) || is_float($temp))) {
            throw new InvalidArgumentException('Temp must be a number.');
        }
        
        $this->temp = $temp;
    }

    /**
     * @param $type
     */
    protected function setType($type) 
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    abstract public function alarm();
}
