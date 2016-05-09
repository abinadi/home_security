<?php

namespace Security;

use InvalidArgumentException;

class TemperatureSensor extends AbstractSensor implements Sensor
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
     * @var array
     */
    private $types = ['Fire', 'Freeze'];

    /**
     * TemperatureSensor constructor.
     * @param string $name
     * @param $type
     */
    public function __construct($name, $type)
    {
        parent::__construct($name);

        $this->setType($type);
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
        $this->temp = $temp;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        if ( ! in_array($type, $this->types)) {
            throw new InvalidArgumentException('Can only be a Fire or a Freeze temp sensor.');
        }
        
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
    public function alarm()
    {
        if ($this->type === 'Fire' && $this->temp >= 120) {
            return true;
        }
        
        if ($this->type === 'Freeze' && $this->temp <= 32) {
            return true;
        }
        
        return false;
    }
}
