<?php
namespace Security\Sensor;

interface Sensor
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param $input
     */
    public function detect($input);

    /**
     * @return void
     */
    public function detectRandom();

    /**
     * @return bool
     */
    public function alarm();
}
