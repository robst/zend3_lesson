<?php

namespace CashJournal\Model;

use DateTime;

class Entry extends AbstractEntity
{
    use Nameable;

    /**
     * @var null|float
     */
    private $amount;

    /**
     * @var null|Category
     */
    private $category;

    /**
     * @var null|DateTime
     */
    private $dateOfEntry;

    /**
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return null|Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return null|DateTime
     */
    public function getDateOfEntry(): ?DateTime
    {
        return $this->dateOfEntry;
    }

    /**
     * @param DateTime $dateOfEntry
     */
    public function setDateOfEntry(DateTime $dateOfEntry)
    {
        $this->dateOfEntry = $dateOfEntry;
    }
}
