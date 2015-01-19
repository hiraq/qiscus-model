<?php
namespace QiscusCore\Activity;

use QiscusInfra\Activity\Dashboard;
use QiscusInfra\Repository\Room as RoomRepo;
use Qiscus\Entity\User;
use Qiscus\Entity\Room as RoomEntity;

/**
 * This test class act as Application layer.
 * We can manage our implemented code in the Infrastructure
 * layer in here.
 */
class DashboardTest extends \PHPUnit_Framework_TestCase
{
    private $Dashboard;
    private $RoomRepo;

    /**
     * Call and build object from infrastructure
     */
    public function setUp()
    {
        $user = new User;
        $this->Dashboard = new Dashboard($user);
        $this->RoomRepo = new RoomRepo;
    }

    public function testCreateRoom()
    {

        $room = $this->__setUpRoomEntity();

        /*
         * user try to create room
         * save to datasource
         */
        $this->Dashboard->addRoom($this->RoomRepo, $room);

        /*
         * what we expect ?
         * when we try to read from datasource (InMemory)
         * it should give a response a same object with $room
         */
        $getRoom = $this->RoomRepo->read($room->id);
        $this->assertNotEmpty($getRoom);
        $this->assertEquals("test room 1", $getRoom->name);
    }

    public function testDeleteRoom()
    {
        $room = $this->__setUpRoomEntity();

        /*
         * user try to create room
         * save to datasource
         */
        $this->Dashboard->addRoom($this->RoomRepo, $room);

        /*
         * and suddenly, User forgot about something
         * then he/she decide to remove a room he has
         * been created just now
         */
        $this->Dashboard->deleteRoom($this->RoomRepo, $room->id);

        /*
         * what we expect?
         * User has been delete the room he/she just created
         * when we try to fetch that room from datasource
         * it should not exists anymore
         */
        $getRoom = $this->RoomRepo->read($room->id);
        $this->assertNull($getRoom);
    }

    private function __setUpRoomEntity()
    {
        /*
         * User try to setup
         * new Room entity object
         */
        $room = new RoomEntity;
        $room->id = 1;
        $room->name = "test room 1";
        $room->created_at = date('c');
        $room->updated_at = date('c');

        return $room;
    }

}
