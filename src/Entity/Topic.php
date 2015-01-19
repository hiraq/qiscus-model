<?php
namespace Qiscus\Entity;

use Qiscus\Base\Entity;

class Topic implements Entity
{
    public $id;
    public $room;
    public $name;
    public $created_at;
    public $updated_at;
}
