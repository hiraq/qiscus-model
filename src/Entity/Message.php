<?php
namespace Qiscus\Entity;

use Qiscus\Base\Entity;

class Message implements Entity
{
    public $id;
    public $user;
    public $message;
}
