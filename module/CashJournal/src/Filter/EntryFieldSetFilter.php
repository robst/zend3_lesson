<?php

namespace CashJournal\Filter;

use CashJournal\Mapper\MapperInterface;
use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;
use Zend\Filter\Callback;

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
            'required' => true,
            'filters' => [
                [
                    'name' => Callback::class,
                    'options' => [
                        'callback' => [$this, 'convertStringToDate']
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'category',
            'required' => true,
            'filters' => [
                [
                    'name' => Callback::class,
                    'options' => [
                        'callback' => [$this, 'loadCategory']
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param string $date
     *
     * @return \DateTime
     */
    public function convertStringToDate(string $date)
    {
        return new \DateTime($date);
    }

    /**
     * @param string $categoryId
     *
     * @return \CashJournal\Model\EntityInterface|string
     */
    public function loadCategory(string $categoryId)
    {
        #return $this->mapper->find($categoryId);

        return $categoryId;
        // PHP Notice:  Object of class CashJournal\Model\Category could not be converted to int in
        return $this->mapper->find($categoryId);
    }
}
