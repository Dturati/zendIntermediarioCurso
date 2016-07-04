<?php
namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
 Doctrine\Common\Persistence\ObjectManager;

use SONUser\Entity\User;

class LoadUser extends AbstractFixture 
{
 
    public function load(ObjectManager $manager){
        $user = new User();
        $user->setNome("david")
                ->setEmail("davidturati@gmail.com")
                ->setPassword('asuszenfone2')
                ->setActive(true);
        $manager->persist($user);
        $manager->flush();
    }
        
}
