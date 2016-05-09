<?php

require_once '../vendor/autoload.php';

// Create a new sensor collection and add 10 sensors to it
$sensors = new \Security\Sensor\SensorCollection();

$sensors->add(new \Security\Sensor\FireTemperatureSensor('Kitchen Temperature'));
$sensors->add(new \Security\Sensor\FreezeTemperatureSensor('Basement Temperature'));
$sensors->add(new \Security\Sensor\DoorSensor('Front Door'));
$sensors->add(new \Security\Sensor\DoorSensor('Back Door'));
$sensors->add(new \Security\Sensor\GlassBreakSensor('Basement'));
$sensors->add(new \Security\Sensor\GlassBreakSensor('Main Floor'));
$sensors->add(new \Security\Sensor\GlassBreakSensor('Upstairs'));
$sensors->add(new \Security\Sensor\SmokeDetectorSensor('Bedroom 1'));
$sensors->add(new \Security\Sensor\SmokeDetectorSensor('Bedroom 2'));
$sensors->add(new \Security\Sensor\SmokeDetectorSensor('Hallway'));

// Randomize the sensors (for demonstration purposes)
$sensors->randomize();

// Use Smarty for extra credit
$smarty = new Security\Smarty\SmartyWrapper();

// Bonus Dual Temperature Sensor
$dual = new Security\Sensor\DualTemperatureSensor('Wine Cellar');
$dual->detectRandom();

// Display our sensor output
$smarty->render('index', compact('sensors', 'dual'));
