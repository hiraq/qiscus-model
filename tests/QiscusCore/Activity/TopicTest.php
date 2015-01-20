<?php
namespace QiscusCore\Activity;

use QiscusInfra\Activity\Topic as TopicActivity;
use QiscusInfra\Repository\Message as MessageRepo;
use QiscusInfra\Notification\Memory as MemoryNotif;
use Qiscus\Entity\Message as MessageEntity;
use Qiscus\Entity\User as UserEntity;

class TopicTest extends \PHPUnit_Framework_TestCase
{
    private $Topic;
    private $MessageRepo;
    private $Notif;
    private $UserEntity;

    public function setUp()
    {
        $this->Topic = new TopicActivity;
        $this->MessageRepo = new MessageRepo;
        $this->Notif = new MemoryNotif;
        $this->UserEntity = new UserEntity;

        /*
         * register event handler
         * triggered when 'message_published' broadcasted
         */
        $this->Topic->register('message_published', $this->Notif);
    }

    public function testPublishMessage()
    {

        $message = $this->__setUpMessage();

        /*
         * User publish a message inside
         * Topic
         */
        $this->Topic->publishMessage($this->MessageRepo, $message);

        /*
         * try to get message from datasource
         * test : message should be saved and can be fetched
         */
        $getMessage = $this->MessageRepo->read($message->id);
        $this->assertNotEmpty($getMessage);
        $this->assertEquals("ini chatku", $getMessage->message);
        $this->assertEquals($this->UserEntity, $getMessage->user);

        /*
         * when message published
         * notif handler should be triggered
         */
        $this->assertTrue($this->Notif->isTriggered());
    }

    public function testDeleteMessage()
    {
        $message = $this->__setUpMessage();

        /*
         * User publish a message inside
         * Topic
         */
        $this->Topic->publishMessage($this->MessageRepo, $message);

        /*
         * User do something wrong with his/her message
         * then they want to delete it
         */
        $this->Topic->deleteMessage($this->MessageRepo, $message->id);

        /*
         * try to get message from data source
         * it should be null, because we just delete the message
         */
        $getMessage = $this->MessageRepo->read($message->id);
        $this->assertNull($getMessage);
    }

    /**
     * setup message procedure
     */
    private function __setUpMessage()
    {
        $message = new MessageEntity;
        $message->id = 1;
        $message->user = $this->UserEntity;
        $message->message = "ini chatku";         

        return $message;
    }
}
