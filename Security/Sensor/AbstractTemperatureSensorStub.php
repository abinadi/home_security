<?php

namespace Security\Sensor;

class AbstractTemperatureSensorStub extends AbstractTemperatureSensor
{
    public function detectRandom()
    {
    }

    public function alarm()
    {
        return true;
    }
}
