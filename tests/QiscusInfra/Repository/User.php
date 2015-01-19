<?php
namespace QiscusInfra\Repository;

use Qiscus\Entity\User as UserEntity;
use Qiscus\Repository\User as UserRepo;
use Qiscus\Utility\InMemory;

class User implements UserRepo
{
    private $engine;

    public function __construct()
    {
        $this->engine = new InMemory;
    }

    public function create(UserEntity $user)
    {
        $this->engine->onMap($user->id, $user);
        $this->engine->onMap($user->email, $user);
    }

    public function read($id)
    {
        return $this->engine->fromMap($id);
    } 

    public function update(UserEntity $user)
    {
        $this->engine->onMap($user->id, $user);
        $this->engine->onMap($user->email, $user);
    }

    public function destroy($id)
    {
        $this->engine->removeFromMap($id);
    } 

    public function findByEmail($email)
    {
        return $this->engine->fromMap($email);
    }
}
