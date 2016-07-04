<?php
namespace SONAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use SONAcl\Entity\Role;

class LoadRole extends AbstractFixture
{
         public function load(ObjectManager $manager)
         {
            $role = new Role();
             $role->setNome("visitante");
             $manager->persist($role);

             $manager->flush();
         }


}