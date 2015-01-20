<?php
namespace Qiscus\Activity;

use Qiscus\Entity\Message as MessageEntity;
use Qiscus\Entity\File as FileEntity;
use Qiscus\Repository\Topic as TopicRepo;
use Qiscus\Repository\Message as MessageRepo;
use Qiscus\Repository\File as FileRepo;
use Qiscus\Utility\Event\Publisher as Publishable;

abstract class Topic
{
    /**
     * include trait Publisher
     * can trigger an event to consumed
     * by others
     */
    use Publishable;

    /**
     * After User inside the dashboard
     * they can publish Message to another
     */
    abstract public function publishMessage(MessageRepo $repo, MessageEntity $message);

    /**
     * User can delete message
     */
    abstract public function deleteMessage(MessageRepo $repo, $id);        
}
