<?php
namespace QiscusCore\Activity;

use QiscusInfra\Activity\Room;
use QiscusInfra\Repository\Topic as TopicRepo;
use Qiscus\Entity\Topic as TopicEntity;
use Qiscus\Entity\Room as RoomEntity;

class RoomTest extends \PHPUnit_Framework_TestCase
{
    private $Room;
    private $TopicRepo;

    public function setUp()
    {
        /*
         * User select a Room
         * system should be load that Room
         * with selected Topic
         *
         * in this case: new Topic
         */
        $topic = new TopicEntity;
        $this->Room = new Room($topic);
        $this->TopicRepo = new TopicRepo;
    }

    public function testAddTopic()
    {
        /*
         * because topic has a relation
         * with room, we should create room entity first
         * then link it with topic
         */
        $room = $this->__setUpRoom();
        $topic = new TopicEntity;
        $topic->room = $room;
        $topic->name = "ini topic 1";
        $topic->created_at = date('c');
        $topic->updated_at = date('c');

        /*
         * User try to crate new topic inside "this" room
         */
        $this->Room->addTopic($this->TopicRepo, $topic);

        /*
         * expectation?
         * when we try to fetch the topic data from datasource
         * all topic entity value should be same with $topic 
         */
        $getTopic = $this->TopicRepo->read($topic->id);
        $this->assertNotEmpty($getTopic);
        $this->assertEquals("ini topic 1", $getTopic->name);
        $this->assertEquals($room, $getTopic->room);
    }

    private function __setUpRoom()
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
