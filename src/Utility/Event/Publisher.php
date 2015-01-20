<?php
namespace Qiscus\Utility\Event;

use Qiscus\Utility\Event\Subscriber;

trait Publisher
{
    private $handlers = [];

    /**
     * Register a handler to spesific event
     */
    public function register($eventName, Subscriber $handler)
    {
        $this->handlers[$eventName][] = $handler;
    }

    /**
     * trigger an event
     * broadcast to all handlers
     */
    public function trigger($eventName, $params = null)
    {
        /*
         * only broadcast
         * if event has handlers
         */
        if (array_key_exists($eventName, $this->handlers)) {
            
            $countHandlers = count($this->handlers[$eventName]);

            /*
             * only if event handlers
             * is array collection and not empty
             */
            if (is_array($this->handlers[$eventName]) 
                && $countHandlers > 0) {

                /*
                 * broadcast to all handlers
                 */
                foreach($this->handlers[$eventName] as $handler) {
                    $handler->run($params);
                }                    

            }

        }
    }
}

