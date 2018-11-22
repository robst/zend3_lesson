<?php

namespace CashJournal\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * Class Category
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category extends AbstractEntity
{
    use Nameable;

    /**
     * @var boolean
     * @ORM\Column(name="issue", type="boolean")
     */
    private $issue;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(
     *     targetEntity="CashJournal\Model\Entry",
     *     mappedBy="category", fetch="EAGER",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"}
     * )
     */
    private $entries;

    /**
     * @return bool
     */
    public function getIssue(): bool
    {
        return (bool) $this->issue;
    }

    /**
     * @param bool $issue
     */
    public function setIssue(bool $issue)
    {
        $this->issue = $issue;
    }

    /**
     * @return Collection
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    /**
     * @param Collection $entries
     */
    public function setEntries(Collection $entries): void
    {
        $this->entries = $entries;
    }

    public function getNumberOfEntries(): int
    {
        return $this->getEntries()->count();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->getName();
    }
}
