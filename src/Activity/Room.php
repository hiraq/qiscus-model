<?php
namespace Qiscus\Activity;

use Qiscus\Entity\Topic;

abstract class Room
{
    protected $loadedTopic;

    /**
     * Room should be constructed
     * with valid topic entity
     */
    public function __construct(Topic $topic)
    {
        $this->loadedTopic = $topic;
    }

    /**
     * After User select a room
     * they can add more topics inside
     * that room
     */
    abstract public function addTopic($name);

    /**
     * User can select a Topic
     * and then unsubscribe from selected Topic
     */
    abstract public function unsubscribeTopic(Topic $topic);
}
