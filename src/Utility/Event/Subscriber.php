<?php
namespace Qiscus\Utility\Event;

abstract class Subscriber
{
    /**
     * Listen to an event
     * and do something when event triggered
     */    
    abstract public function run($params = []); 
}
