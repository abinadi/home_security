# PHP Home Security Exercise

## Install

* run `composer install`
* Make the smarty directory writeable `chmod 777 smarty/templates_c`

## Tests

Tests are done with phpspec

`./vendor/bin/phpspec run`

## Misc

Temperatures are in fahrenheit. 

---

# The Challenge:

You’ve decided to build a custom security system for your house. You’d like to have a web page indicating the current status of the sensors. Right now you’re not concerned with whether or not the alarms were going off while you were away, you only want to check on their given state at a particular moment.

## Requirements

* Support multiple sensor types
  * Temperature Sensor
  * Door Open/Closed Sensor
  * Glass Break Sensor
  * Smoke Detector
* Sensor types should support readout of their state as well as an alarm indicating if the value has passed a pre‐set threshold.
* Ability to simulate a changing state of sensors for demonstration purposes, random input values each time the program is run is acceptable.
* Report page should show the current status of all sensors as well as if the alarm is triggered for that sensor.

## Concrete Application

* The application should implement the following sensors:
  * 2 Temperature Sensors
  * 2 Door Sensors
  * 3 Glass Break Sensors
  * 3 Smoke Detector

## Bonus Points

* You’ve got a wine cellar in your basement and you want to know if the temperature gets too cold or too hot in that room (dual alarm threshold design)
* Diagram of Class Structure (Planning)
* Use of smarty templates

## What to look for

* Good OO Design
* Clean, readable code
* Extensibility. What limitations are in the design
* Good separation of concerns
* Use of PHP built-in functions where appropriate
* Under or overuse of comments
