<?php
namespace QiscusInfra\Repository;

use Qiscus\Base\Entity;
use Qiscus\Repository\Room as RoomRepo;
use Qiscus\Utility\InMemory;

class Room implements RoomRepo
{
    private $engine;

    public function __construct()
    {
        $this->engine = new InMemory;
    }

    public function create(Entity $room)
    {
        $this->engine->onMap($room->id, $room);
    }

    public function read($id)
    {
        return $this->engine->fromMap($id);
    } 

    public function update(Entity $room)
    {
        $this->engine->onMap($room->id, $room);
    }

    public function destroy($id)
    {
        $this->engine->removeFromMap($id);
    } 
}
