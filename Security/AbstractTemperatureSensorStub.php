<?php

namespace Security;

class AbstractTemperatureSensorStub extends AbstractTemperatureSensor
{
    public function alarm()
    {
        return true;
    }
}
