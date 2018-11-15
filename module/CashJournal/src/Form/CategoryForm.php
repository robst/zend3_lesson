<?php

namespace CashJournal\Form;

use CashJournal\Form\FieldSet\CategoryFieldSet;
use Zend\Form\Form;

class CategoryForm extends Form
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'type' => CategoryFieldSet::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit'
        ]);
    }
}
