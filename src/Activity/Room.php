<?php
namespace Qiscus\Activity;

use Qiscus\Entity\Topic as TopicEntity;
use Qiscus\Repository\Topic as TopicRepo;

abstract class Room
{
    protected $loadedTopic;

    /**
     * Room should be constructed
     * with valid topic entity
     */
    public function __construct(TopicEntity $topic)
    {
        $this->loadedTopic = $topic;
    }

    /**
     * After User select a room
     * they can add more topics inside
     * that room
     */
    abstract public function addTopic(TopicRepo $topicRepo, TopicEntity $topic);
}
