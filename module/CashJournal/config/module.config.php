<?php

namespace CashJournal;

use CashJournal\Controller\CategoryController;

use CashJournal\Factory\Controller\CategoryControllerFactory;
use CashJournal\Factory\FieldSet\CategoryFieldSetFactory;
use CashJournal\Factory\Form\CategoryFormFactory;
use CashJournal\Factory\Mapper\CategoryMapperFactory;
use CashJournal\Form\FieldSet\CategoryFieldSet;
use CashJournal\Mapper\CategoryMapper;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorOptionsInterface;
use CashJournal\Filter\CategoryFieldSetFilter;
use CashJournal\Factory\Filter\CategoryFieldSetFilterFactory;
use CashJournal\Form\CategoryForm;
use CashJournal\Filter\CategoryFormFilter;
use CashJournal\Factory\Filter\CategoryFormFilterFactory;

return [

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

    'input_filters' => [
        'factories' => [
            CategoryFieldSetFilter::class => CategoryFieldSetFilterFactory::class,
            CategoryFormFilter::class => CategoryFormFilterFactory::class,

        ]
    ],
    'form_elements' => [
        'factories' => [
            CategoryForm::class => CategoryFormFactory::class,
            CategoryFieldSet::class => CategoryFieldSetFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
