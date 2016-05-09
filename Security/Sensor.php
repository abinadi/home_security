<?php
namespace Security;

interface Sensor
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return bool
     */
    public function alarm();
}
