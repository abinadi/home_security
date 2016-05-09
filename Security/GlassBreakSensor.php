<?php

namespace Security;

class GlassBreakSensor extends AbstractSensor implements Sensor
{
    /**
     * @var string
     */
    protected $type = 'GlassBreak';

    /**
     * @var float
     */
    protected $state;

    /**
     * GlassBreakSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->listen(0.0);
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state . 'hz';
    }

    /**
     * @param mixed $state
     */
    public function listen($state)
    {
        if ( ! (is_int($state) || is_float($state))) {
            throw new \InvalidArgumentException();
        }
        
        $this->state = $state;
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
        if ($this->state >= 450) {
            return true;
        }
        
        return false;
    }
}
