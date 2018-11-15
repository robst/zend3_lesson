<?php

namespace CashJournal\Model;

use DateTime;

class Entry implements EntityInterface
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var null|string
     */
    private $name;

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
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

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
