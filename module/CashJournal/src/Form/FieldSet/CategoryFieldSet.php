<?php

namespace CashJournal\Form\FieldSet;

use CashJournal\Filter\CategoryFilter;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

use CashJournal\Model\Category;
use Zend\Hydrator\ClassMethods;

class CategoryFieldSet extends Fieldset implements InputFilterProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Category());
        parent::init();
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
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        $filter = new CategoryFilter();

        return $filter->getInputs();
    }
}
