<?php

namespace Security;

class FreezeTemperatureSensor extends AbstractTemperatureSensor
{
    public function __construct($name)
    {
        parent::__construct($name);

        $this->setType('Freeze');
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
