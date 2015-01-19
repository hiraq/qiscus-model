<?php
namespace QiscusInfra\Activity;

use Qiscus\Activity\Dashboard as AbstractDashboard;
use Qiscus\Entity\User;
use Qiscus\Entity\Room;
use Qiscus\Repository\Room as RoomRepo;

class Dashboard extends AbstractDashboard
{
    public function addRoom(RoomRepo $roomRepo, Room $room)
    {
        $roomRepo->create($room); 
    }

    public function deleteRoom(RoomRepo $roomRepo, $id)
    {
        $roomRepo->destroy($id);
    } 
}
