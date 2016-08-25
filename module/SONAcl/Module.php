<?php

namespace SONAcl;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                     __NAMESPACE__.'Admin'  => __DIR__ . '/src/' . __NAMESPACE__."Admin",
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
   

        public function getServiceConfig()
    {
        return array(
                    'factories' => array(
                        
                          'SONAcl\Form\Role' => function($sm)
                            {
                                 $em = $sm->get('Doctrine\ORM\EntityManager');
                                 $repo = $em->getRepository('SONAcl\Entity\Role');
                                 $parent = $repo->fetchParent();
                                 return new Form\Role('role',$parent);
                            },
                                    
                            'SONAcl\Form\Privilege' => function($sm)
                            {
                                 $em = $sm->get('Doctrine\ORM\EntityManager');
                                 
                                 $repoRoles = $em->getRepository('SONAcl\Entity\Role');
                                 $roles = $repoRoles->fetchParent();
                                  
                                 $repoResources = $em->getRepository('SONAcl\Entity\Resource');
                                 $resources = $repoResources->fetchPairs();
                                 
                                 return new Form\Privilege('privilege',$roles,$resources);
                            },
                                    
                            'SONAcl\Service\Role' => function($sm)
                            {
                                  return new Service\Role($sm->get('Doctrine\ORM\EntityManager'));
                            },
                                    
                            'SONAcl\Service\Resource' => function($sm)
                            {
                                  return new Service\Resource($sm->get('Doctrine\ORM\EntityManager'));
                            },
                                    
                            'SONAcl\Service\Privilege' => function($sm)
                            {
                                  return new Service\Privilege($sm->get('Doctrine\ORM\EntityManager'));
                            },
                                    
                          'SONAcl\Permissions\Acl' => function($sm){
                                $em = $sm->get('Doctrine\ORM\EntityManager');
                                
                                $repoRole = $em->getRepository('SONAcl\Entity\Role');
                                $role = $repoRole->findAll();
                              
                                
                                $repoResource = $em->getRepository('SONAcl\Entity\Resource');
                                $resource =  $repoResource->findAll();
                               
                                
                                $repoPrivilege = $em->getRepository('SONAcl\Entity\Privilege');
                                $privilege =  $repoPrivilege->findAll();
                              
                                return new Permissions\Acl($role, $resource, $privilege);
                                
                           },
                                   
                    )
        ); 
    }
    
 
    
}
