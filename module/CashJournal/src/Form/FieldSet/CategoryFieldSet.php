<?php

namespace CashJournal\Form\FieldSet;

use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;

class CategoryFieldSet extends Fieldset
{
    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->add([
            'name' => 'id',
            'type' => Hidden::class
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Name'
            ]
        ]);

        $this->add([
            'name' => 'issue',
            'type' => Checkbox::class,
            'options' => [
                'label' => 'Ausgabe?'
            ]
        ]);

        parent::init();
    }
}
