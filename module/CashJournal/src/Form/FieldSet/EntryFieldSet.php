<?php

namespace CashJournal\Form\FieldSet;

use CashJournal\Model\Category;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element\Date;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Number;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;

class EntryFieldSet extends Fieldset
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
            'name' => 'amount',
            'type' => Number::class,
            'options' => [
                'label' => 'Summe'
            ]
        ]);

        $this->add([
            'name' => 'date_of_entry',
            'type' => Date::class,
            'options' => [
                'label' => 'Datum'
            ]
        ]);

        $this->add([
            'name' => 'category',
            'type' => ObjectSelect::class,
            'options' => [
                'target_class' => Category::class,
            ]
        ]);

        parent::init();
    }
}
