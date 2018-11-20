<?php

namespace CashJournal\Filter;

use Zend\InputFilter\InputFilter;

class EntryFormFilter extends InputFilter
{
    /**
     * CategoryFormFilter constructor.
     *
     * @param EntryFieldSetFilter $entryFieldSetFilter
     */
    public function __construct(EntryFieldSetFilter $entryFieldSetFilter)
    {
        $this->add($entryFieldSetFilter, 'entry');
    }
}
