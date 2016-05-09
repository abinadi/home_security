<?php
namespace Security\Sensor;

class DoorSensor extends AbstractSensor implements Sensor
{
    /**
     * @var string
     */
    protected $position;

    /**
     * @var array
     */
    protected $allowedPositions = ['Open', 'Closed'];

    /**
     * DoorSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->detect('Closed');
        $this->setType('Door');
    }

    /**
     * @param $position
     */
    public function detect($position)
    {
        if ( ! in_array($position, $this->allowedPositions)) {
            throw new \InvalidArgumentException('A door may only be Open or Closed');
        }
        
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->getState() === 'Open') {
            return true;
        }
        
        return false;
    }
}
