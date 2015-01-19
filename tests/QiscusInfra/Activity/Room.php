<?php
namespace QiscusInfra\Activity;

use Qiscus\Activity\Room as AbstractRoom;
use Qiscus\Entity\Topic as TopicEntity;
use Qiscus\Repository\Topic as TopicRepo;

class Room extends AbstractRoom
{
    public function addTopic(TopicRepo $topicRepo, TopicEntity $topic)
    {
        $topicRepo->create($topic);
    }
}
