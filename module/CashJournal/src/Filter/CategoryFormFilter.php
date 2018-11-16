<?php

namespace CashJournal\Filter;

use Zend\InputFilter\InputFilter;

class CategoryFormFilter extends InputFilter
{
    /**
     * CategoryFormFilter constructor.
     *
     * @param CategoryFieldSetFilter $categoryFieldSetFilter
     */
    public function __construct(CategoryFieldSetFilter $categoryFieldSetFilter)
    {
        $this->add($categoryFieldSetFilter, 'category');
    }
}
