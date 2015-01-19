<?php
namespace Qiscus\Repository;

use Qiscus\Base\Repository;

interface User extends Repository
{
    public function findByEmail($email);
}
