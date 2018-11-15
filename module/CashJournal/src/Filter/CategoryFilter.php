<?php

namespace CashJournal\Filter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class CategoryFilter extends InputFilter
{
    public function __construct()
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
    }
}
