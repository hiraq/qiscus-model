<?php
namespace Qiscus\Base;

use Qiscus\Base\Entity;

interface Repository 
{
    public function create(Entity $entity);
    public function read($id);
    public function update(Entity $entity);
    public function destroy($id);
}
