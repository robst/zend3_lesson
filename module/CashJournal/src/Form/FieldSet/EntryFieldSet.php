<?php

namespace CashJournal\Form\FieldSet;

use CashJournal\Model\Category;
use CashJournal\Util\ObjectManagerTrait;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Form\Element\Date;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Number;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;

class EntryFieldSet extends Fieldset implements ObjectManagerAwareInterface
{
    use ObjectManagerTrait;

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
                'label' => 'Datum',
                'format' => 'Y-m-d',
            ],
            'attributes' => [
                'step' => 'any',
            ]
        ]);

        $this->add([
            'name' => 'category',
            'required' => false,
            'type' => ObjectSelect::class,
            'options' => [
                'target_class' => Category::class,
                'object_manager' => $this->getObjectManager(),
                'property'       => 'id',
                'display_empty_item' => true,
                'empty_item_label'   => '---',
                'label_generator' => function ($targetEntity) {
                    return $targetEntity->getName();
                },
            ]
        ]);

        parent::init();
    }
}
