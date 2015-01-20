<?php
namespace QiscusInfra\Repository;

use Qiscus\Base\Entity;
use Qiscus\Repository\Message as MessageRepo;
use Qiscus\Utility\InMemory;

class Message implements MessageRepo
{
    private $engine;

    public function __construct()
    {
        $this->engine = new InMemory;
    }

    public function create(Entity $message)
    {
        $this->engine->onMap($message->id, $message);
    }

    public function read($id)
    {
        return $this->engine->fromMap($id);
    } 

    public function update(Entity $message)
    {
        $this->engine->onMap($message->id, $message);
    }

    public function destroy($id)
    {
        $this->engine->removeFromMap($id);
    } 
}
