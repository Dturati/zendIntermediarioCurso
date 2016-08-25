<?php
namespace SONAcl;

return [
    'router' => [
        'routes' => [
            
                    'sonacl-admin' => [
                        'type'      => 'Literal',
                        'options'   => [
                                'route'         =>  '/admin/acl',
                                'defaults' => [
                                     '__NAMESPACE__' =>  'SONAcl/Controller',
                                     'controller'    => 'Roles',
                                     'action'        => 'index'
                            ]
                        ],
                    
                    #rota filho
                    'may_terminate' => true,
                        'child_routes' => [
                          'default' => [
                              'type' => 'Segment',
                              'options' => [
                                  'route' => '/[:controller[/:action[/:id]]]',
                                  'constraints' => [
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '\d+'
                                ],
                                'defaults' => [
                                         '__NAMESPACE__' =>  'SONAcl/Controller',
                                         'controller'    => 'roles'
                                ]
                             ]  
                        ],
                        'paginator' => [
                            'type'      => 'Segment',
                            'options'   =>  [
                                'route' => '/[:controller[/page/:page]]',
                                 'constraints' => [
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'page' => '\d+'
                                ],
                                  'defaults' => [
                                         '__NAMESPACE__' =>  'SONAcl/Controller',
                                         'controller'    => 'roles'
                                ]
                            ] 
                        ],
                    ]
                ]    
            
            
            ]
        ],
    
    'controllers' => [
        'invokables' => [
            'SONAcl\Controller\Roles' => 'SONAcl\Controller\RolesController',
            'SONAcl\Controller\Resources' => 'SONAcl\Controller\ResourcesController',
            'SONAcl\Controller\Privileges' => 'SONAcl\Controller\PrivilegesController',
        ]
    ],
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
     'doctrine' => array(
        'driver' => array(
               __NAMESPACE__. '_driver' => array(
                   'class'  => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                   'cache'  => 'array',
                   'paths'  => array(__DIR__ . '/../src/'.__NAMESPACE__.'/Entity'),
               ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
         'fixture' => array(
            'SONAcl_fixture' => __DIR__. '/../src/SONAcl/Fixture',
        ),
    ),
    
    'data-fixture' => array(
            'SONAcl_fixture' => __DIR__. '/../src/SONAcl/Fixture',
        ),
    
   
    
];

