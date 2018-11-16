<?php

namespace CashJournal\Model;

class Category extends AbstractEntity
{
    use Nameable;

    /**
     * @var boolean
     */
    private $issue;

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
