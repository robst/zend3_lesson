<?php

namespace CashJournal\Form;

use CashJournal\Form\FieldSet\EntryFieldSet;
use Zend\Form\Form;

class EntryForm extends Form
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'entry',
            'type' => EntryFieldSet::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit'
        ]);

        parent::init();
    }
}
