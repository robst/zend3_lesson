<?php

use Zend\Router\Http\Segment;
use CashJournal\Controller\CategoryController;
use CashJournal\Controller\EntryController;

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
        ],
        'entries' => [
            'type' => Segment::class,
            'options' => [
                'route' => '/entry[/:action][/:id]',
                'constraints' => [
                    'action'    => '(add|edit|delete)',
                    'id'        => '\d+'
                ],
                'defaults' => [
                    'controller'    => EntryController::class,
                    'action'        => 'index'
                ]
            ]
        ]
    ],
];
