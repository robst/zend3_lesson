<?php

namespace CashJournal\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Entry
 * @ORM\Table(name="entry")
 * @ORM\Entity()
 */
class Entry extends AbstractEntity
{
    use Nameable;

    /**
     * @var null|float
     *
     * @ORM\Column(name="amount", type="decimal")
     */
    private $amount;

    /**
     * @var null|Category
     *
     * @ORM\ManyToOne(targetEntity="CashJournal\Model\Category", inversedBy="entries", fetch="EAGER")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    protected $category;

    /**
     * @var null|DateTime
     *
     * @ORM\Column(name="date_of_entry", type="datetime")
     */
    private $dateOfEntry;

    /**
     * @return float
     */
    public function getFormattedAmount(): float
    {
        if (null === $this->getAmount()) {
            return (float) 0;
        }

        if ($this->isInIssueCategory()) {
            return (float) $this->getAmount() * -1;
        }

        return (float) $this->getAmount();
    }

    /**
     * @return bool
     */
    public function isInIssueCategory(): bool
    {
        $category = $this->getCategory();

        if (null === $category) {
            return false;
        }
        return $category->getIssue();
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
