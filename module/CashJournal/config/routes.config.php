<?php

use Zend\Router\Http\Segment;
use CashJournal\Controller\CategoryController;

return [
    'routes' => [
        'categories'  => [
            'type' => Segment::class,
            'options' => [
                'route' => '/category[/:action][/:id]',
                'constraints' => [
                    'action'    => '(add|edit|delete)',
                    'id'        => '\d+'
                ],
                'defaults' => [
                    'controller'    => CategoryController::class,
                    'action'        => 'index'
                ]
            ]
        ]
    ],
];
