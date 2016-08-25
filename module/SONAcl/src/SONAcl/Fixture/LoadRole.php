<?php
namespace SONAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use SONAcl\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface
{
         public function load(ObjectManager $manager)
         {
            
             $role = new Role();
             $role->setNome("Visitante");
             $manager->persist($role);
             
              $role = new Role();
             $visitante = $manager->getReference("SONAcl\Entity\Role",1);
             $role->setNome("Registrado")
                     ->setParent($visitante);
             $manager->persist($role);
             
            $role = new Role();
            $registrado = $manager->getReference("SONAcl\Entity\Role",2);
            $role->setNome("Redator")
                     ->setParent($registrado);
             $manager->persist($role);
             
             $role = new Role();
             $role->setNome("Admin")
                     ->setIs_admin(true);
             $manager->persist($role);
             
             $manager->flush();
              
         }

         public function getOrder() {
             return 1;
         }

}