<?php

use CashJournal\Controller\CategoryController;

use CashJournal\Factory\Controller\CategoryControllerFactory;
use CashJournal\Factory\Mapper\CategoryMapperFactory;
use CashJournal\Mapper\CategoryMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorOptionsInterface;

return [

    'db' => include __DIR__ . '/../../../config/db.config.php',
    'router' => include __DIR__.'/routes.config.php',

    'controllers' => [
        'invokables' => [

        ],
        'factories' => [
            CategoryController::class => CategoryControllerFactory::class
        ]
    ],

    'service_manager' => [
        'invokables' => [
            HydratorOptionsInterface::class => ClassMethods::class,
        ],
        'factories' => [
            Sql::class => function ($container) {
                return new Sql($container->get(AdapterInterface::class));
            },

            CategoryMapper::class => CategoryMapperFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
