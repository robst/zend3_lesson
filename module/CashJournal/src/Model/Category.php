<?php

namespace CashJournal\Model;

class Category implements EntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $issue;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = (int) $id;
    }

    /**
     * @return string
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
     * @return int
     */
    public function getIssue(): int
    {
        return (int) $this->issue;
    }

    /**
     * @param int $issue
     */
    public function setIssue(int $issue)
    {
        $this->issue = $issue;
    }
}
