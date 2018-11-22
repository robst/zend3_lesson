<?php

namespace CashJournal\Filter;

use CashJournal\Mapper\MapperInterface;
use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Date;
use Zend\Validator\StringLength;
use Zend\Filter\Callback;
use DateTime;

class EntryFieldSetFilter extends InputFilter
{
    /**
     * @var MapperInterface
     */
    protected $mapper;

    /**
     * EntryFieldSetFilter constructor.
     *
     * @param MapperInterface $mapper
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @{inheritDoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => StringTrim::class]
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 5
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'date_of_entry',
            'required' => false,
            'filters' => [
                [
                    'name' => Callback::class,
                    'options' => array(
                        'callback' => function($value) {
                            if (is_string($value)) {
                                $value = new DateTime($value);
                            }
                            return $value;
                        },
                    ),
                ]
            ],

            'validators' => array(
                array(
                    'name' => Date::class,
                    'options' => array(
                        'format' => 'Y-m-d',
                    ),
                ),
            ),
        ]);
    }
}
