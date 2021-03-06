<?php
namespace SONUser;

return [
    'router' => [
        'routes' => [

                    'sonuser-register' => [
                        'type'      => 'Literal',
                        'options'   => [
                            'route'         =>  '/register',
                            'defaults' => [
                                '__NAMESPACE__' =>  'SONUser/Controller',
                                'controller'    => 'index',
                                'action'        => 'register'
                            ]
                        ]
                    ],
            
                    
                    'sonuser-activate' => [
                        'type'      => 'Segment',
                        'options'   => [
                                'route'         =>  '/register/activate[/:key]',
                                'defaults' => [
                                     '__NAMESPACE__' =>  'SONUser/Controller',
                                     'controller'    => 'index',
                                     'action'        => 'activate'
                            ]
                        ]
                    ],
            
                      'sonuser-auth' => [
                        'type'      => 'Literal',
                        'options'   => [
                                'route'         =>  '/auth',
                                'defaults' => [
                                     '__NAMESPACE__' =>  'SONUser/Controller',
                                     'controller'    => 'auth',
                                     'action'        => 'index'
                            ]
                        ]
                    ],
            
                       'sonuser-logout' => [
                        'type'      => 'Literal',
                        'options'   => [
                                'route'         =>  '/auth/logout',
                                'defaults' => [
                                     '__NAMESPACE__' =>  'SONUser/Controller',
                                     'controller'    => 'auth',
                                     'action'        => 'logout'
                            ]
                        ]
                    ],
            
                    'sonuser-admin' => [
                        'type'      => 'Literal',
                        'options'   => [
                                'route'         =>  '/admin',
                                'defaults' => [
                                     '__NAMESPACE__' =>  'SONUser/Controller',
                                     'controller'    => 'Users',
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
                                         '__NAMESPACE__' =>  'SONUser/Controller',
                                         'controller'    => 'users'
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
                            ] 
                        ],
                    ]
                    
                ]    
            
            
            ]
        ],
    
    'controllers' => [
        'invokables' => [
            'SONUser\Controller\Index' => 'SONUser\Controller\IndexController',
            'SONUser\Controller\Users' => 'SONUser\Controller\UsersController',
            'SONUser\Controller\Auth' => 'SONUser\Controller\AuthController',
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
            'SONUser_fixture' => __DIR__. '/../src/SONUser/Fixture',
        ),
    ),
    
    'data-fixture' => array(
            'SONUser_fixture' => __DIR__. '/../src/SONUser/Fixture',
        ),
    
   
    
];

