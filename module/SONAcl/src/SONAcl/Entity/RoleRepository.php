<?php
namespace SONAcl\Entity;

use Doctrine\ORM\EntityRepository;

//Ainda não sei o que é um repository
class RoleRepository extends EntityRepository
{
    public function fetchParent()
    {
        $entities = $this->findAll();
        $array = array();
        
        foreach ($entities as $entity )
        {
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
}