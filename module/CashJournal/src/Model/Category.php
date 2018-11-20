<?php

namespace CashJournal\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var Collection|ArrayCollection|Entry[]
     *
     * @ORM\OneToMany(targetEntity="CashJournal\Model\Entry", mappedBy="category", fetch="EAGER", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $entries;

    /**
     * @return bool
     */
    public function getIssue(): bool
    {
        return (int) $this->issue;
    }

    /**
     * @param bool $issue
     */
    public function setIssue(bool $issue)
    {
        $this->issue = $issue;
    }

    /**
     * @return Collection|ArrayCollection|Entry[]
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    /**
     * @param Collection|ArrayCollection|Entry[] $entries
     */
    public function setEntries(Collection $entries): void
    {
        $this->entries = $entries;
    }
}
