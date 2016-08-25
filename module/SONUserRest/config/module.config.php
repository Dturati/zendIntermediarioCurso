<?php
return [
     'controllers' => [
            'invokables' => [
                'SONUserRest\Controller\UserRest' => 'SONUserRest\Controller\UserRestController',

            ]
     ],

    'router' => [
        'routes' => [
            'sonuser-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/user[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'SONUserRest\Controller\UserRest',
                    ]
                ]
            ]
        ]
    ],

    'view_manager' => [
        'strategies' => [
            'viewJsonStrategy'
        ]
    ],

    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__. '_driver' => array(
                'class'  => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache'  => 'array',
                'paths'  => array(__DIR__ . '/../src/'.__NAMESPACE__.'/Entity'),
            ),

            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => 'SONUser' . '_driver'
                ),
            ),
        ),
    ),

];