<?php

namespace Security\Sensor;

class FreezeTemperatureSensor extends AbstractTemperatureSensor
{
    public function __construct($name)
    {
        parent::__construct($name);

        $this->setType('Freeze');
        $this->detect(50); // Don't default to an alarm temperature
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
