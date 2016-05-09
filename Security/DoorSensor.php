<?php
namespace Security;

class DoorSensor extends AbstractSensor implements Sensor
{
    /**
     * @var string
     */
    protected $type = 'Door';

    /**
     * @var string
     */
    protected $state;

    /**
     * @var array
     */
    protected $allowedStates = ['Open', 'Closed'];

    /**
     * DoorSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->setState('Closed');
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        if ( ! in_array($state, $this->allowedStates)) {
            throw new \InvalidArgumentException('A door may only be Open or Closed');
        }
        
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
