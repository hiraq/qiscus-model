<?php
namespace QiscusInfra\Notification;

use Qiscus\Utility\InMemory;
use Qiscus\Utility\Event\Subscriber;

class Memory extends Subscriber
{
    private $engine;

    public function __construct()
    {
        $this->engine = new InMemory; 
    }

    /**
     * run when event triggered
     */
    public function run($params = null)
    {
        $this->engine->onMap('event_triggered', true);
    }

    /**
     * here we can test & check
     * if this subscriber has been called
     * or not
     *
     * @return boolean
     */
    public function isTriggered()
    {
        return $this->engine->inMap('event_triggered');
    }
} 
