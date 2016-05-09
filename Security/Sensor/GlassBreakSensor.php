<?php
namespace Security\Sensor;

class GlassBreakSensor extends AbstractSensor implements Sensor
{
    /**
     * @var float
     */
    protected $level;

    /**
     * GlassBreakSensor constructor.
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->detect(0.0);
        $this->setType('GlassBreak');
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->level . 'hz';
    }

    /**
     * @param mixed $level
     */
    public function detect($level)
    {
        if ( ! (is_int($level) || is_float($level))) {
            throw new \InvalidArgumentException();
        }
        
        $this->level = $level;
    }

    /**
     * @return bool
     */
    public function alarm()
    {
        if ($this->level >= 556) {
            return true;
        }
        
        return false;
    }
}
