<?php

namespace CashJournal\Filter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Date;
use Zend\Validator\StringLength;
use Zend\Filter\Callback;
use DateTime;

class EntryFieldSetFilter extends InputFilter
{
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
                    'options' => [
                        'callback' => function ($value) {
                            if (is_string($value)) {
                                $value = new DateTime($value);
                            }
                            return $value;
                        },
                    ],
                ]
            ],

            'validators' => [
                [
                    'name' => Date::class,
                    'options' => [
                        'format' => 'Y-m-d',
                    ],
                ],
            ],
        ]);
    }
}
