<?php

namespace CashJournal;

use CashJournal\Controller\CategoryController;
use CashJournal\Controller\EntryController;
use CashJournal\Factory\Controller\CategoryControllerFactory;
use CashJournal\Factory\Controller\EntryControllerFactory;
use CashJournal\Factory\FieldSet\CategoryFieldSetFactory;
use CashJournal\Factory\FieldSet\EntryFieldSetFactory;
use CashJournal\Factory\Filter\EntryFieldSetFilterFactory;
use CashJournal\Factory\Filter\EntryFormFilterFactory;
use CashJournal\Factory\Form\CategoryFormFactory;
use CashJournal\Factory\Mapper\CategoryMapperFactory;
use CashJournal\Factory\Mapper\EntryMapperFactory;
use CashJournal\Filter\EntryFieldSetFilter;
use CashJournal\Filter\EntryFormFilter;
use CashJournal\Form\EntryForm;
use CashJournal\Factory\Form\EntryFormFactory;
use CashJournal\Form\FieldSet\CategoryFieldSet;
use CashJournal\Form\FieldSet\EntryFieldSet;
use CashJournal\Mapper\CategoryMapper;
use CashJournal\Mapper\EntryMapper;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorOptionsInterface;
use CashJournal\Filter\CategoryFieldSetFilter;
use CashJournal\Factory\Filter\CategoryFieldSetFilterFactory;
use CashJournal\Form\CategoryForm;
use CashJournal\Filter\CategoryFormFilter;
use CashJournal\Factory\Filter\CategoryFormFilterFactory;
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;

return [

    'router' => include __DIR__.'/routes.config.php',

    'controllers' => [
        'invokables' => [

        ],
        'factories' => [
            CategoryController::class => CategoryControllerFactory::class,
            EntryController::class => EntryControllerFactory::class
        ]
    ],

    'service_manager' => [
        'invokables' => [
            HydratorOptionsInterface::class => ClassMethods::class,
        ],
        'factories' => [
            CategoryMapper::class => CategoryMapperFactory::class,
            EntryMapper::class => EntryMapperFactory::class,
        ],
    ],

    'input_filters' => [
        'factories' => [
            CategoryFieldSetFilter::class => CategoryFieldSetFilterFactory::class,
            EntryFieldSetFilter::class => EntryFieldSetFilterFactory::class,

            CategoryFormFilter::class => CategoryFormFilterFactory::class,
            EntryFormFilter::class => EntryFormFilterFactory::class
        ]
    ],
    'form_elements' => [
        'factories' => [
            CategoryForm::class => CategoryFormFactory::class,
            EntryForm::class => EntryFormFactory::class,

            CategoryFieldSet::class => CategoryFieldSetFactory::class,
            EntryFieldSet::class => EntryFieldSetFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => include __DIR__.'/../../../config/db.config.php',
            ],
        ],
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . DIRECTORY_SEPARATOR,
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
                ],
            ],
        ],

    ],
];
