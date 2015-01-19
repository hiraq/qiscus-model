<?php
namespace Qiscus\Activity;

use Qiscus\Entity\Message;
use Qiscus\Entity\File as FileEntity;

/**
 * Why not using abstract class?
 * Because i dont need any constructor!
 */
interface Topic
{
    /**
     * After User inside the dashboard
     * they can publish Message to another
     */
    public function publishMessage(Message $message);

    /**
     * Beside publish messages
     * they can upload file too
     */
    public function uploadFile(FileEntity $file);
}
