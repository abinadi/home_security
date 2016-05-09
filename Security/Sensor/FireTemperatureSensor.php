<?php

namespace Security\Sensor;

class FireTemperatureSensor extends AbstractTemperatureSensor 
{
    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->setType('Fire');
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
