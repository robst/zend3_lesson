<?php

namespace CashJournal\Filter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class CategoryFieldSetFilter extends InputFilter
{
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

        #parent::init();
    }
}
