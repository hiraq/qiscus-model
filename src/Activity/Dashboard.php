<?php
namespace Qiscus\Activity;

use Qiscus\Entity\User;
use Qiscus\Entity\Room as RoomEntity;
use Qiscus\Repository\Room as RoomRepo;

abstract class Dashboard
{
    protected $user;

    /**
     * Dashboard only constructed
     * with user entity object
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * User can add more room
     * after they inside the dashboard
     *
     * @return boolean
     */
    abstract public function addRoom(RoomRepo $roomRepo, RoomEntity $room);

    /**
     * User can select Room
     * then delete it
     *
     * @return boolean
     */
    abstract public function deleteRoom(RoomRepo $roomRepo, $id);
}
