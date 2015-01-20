<?php
namespace QiscusInfra\Activity;

use Qiscus\Activity\Topic as AbstractTopic;
use Qiscus\Entity\Message as MessageEntity;
use Qiscus\Repository\Message as MessageRepo;

class Topic extends AbstractTopic
{
    /**
     * User can publish messages after
     * they choose a topic
     */
    public function publishMessage(MessageRepo $repo, MessageEntity $entity)
    {
        /*
         * save to datasource
         */
        $repo->create($entity);

        /*
         * trigger an event after message saved
         * on datasource
         */
        $this->trigger('message_published', $entity);
    }

    /**
     * User also can delete their message
     */
    public function deleteMessage(MessageRepo $repo, $id)
    {
        $repo->destroy($id);
    } 
}
