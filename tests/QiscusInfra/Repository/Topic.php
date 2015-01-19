<?php
namespace QiscusInfra\Repository;

use Qiscus\Base\Entity;
use Qiscus\Repository\Topic as TopicRepo;
use Qiscus\Utility\InMemory;

class Topic implements TopicRepo
{
    private $engine;

    public function __construct()
    {
        $this->engine = new InMemory;
    }

    public function create(Entity $topic)
    {
        $this->engine->onMap($topic->id, $topic);
    }

    public function read($id)
    {
        return $this->engine->fromMap($id);
    } 

    public function update(Entity $topic)
    {
        $this->engine->onMap($topic->id, $topic);
    }

    public function destroy($id)
    {
        $this->engine->removeFromMap($id);
    } 
}
