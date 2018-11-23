<?php

namespace CashJournal\Test;

use CashJournal\Model\Category;
use CashJournal\Model\Entry;
use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    /** @var Entry */
    protected $entry;

    public function setUp(): void
    {
        $this->entry = new Entry();
        $this->entry->setName('myEntry');
        $this->entry->setAmount(20.00);
        $this->entry->setDateOfEntry(new \DateTime('2018-11-23'));
        $this->entry->setCategory(new Category());
    }

    /**
     * @covers \CashJournal\Model\Entry::getName()
     */
    public function testGetName(): void
    {
        $this->assertEquals('myEntry', $this->entry->getName());
    }

    /**
     * @covers \CashJournal\Model\Entry::getCategory()
     */
    public function testGetCategory(): void
    {
        $this->assertInstanceOf(Category::class, $this->entry->getCategory());
    }

    /**
     * @covers \CashJournal\Model\Entry::getDateOfEntry()
     */
    public function testGetDateOfEntry(): void
    {
        $this->assertInstanceOf(\DateTime::class, $this->entry->getDateOfEntry());
    }

    /**
     * @covers \CashJournal\Model\Entry::getAmount()
     */
    public function testGetAmount(): void
    {
        $this->assertEquals(20.00, $this->entry->getAmount());
    }

    /**
     * @covers \CashJournal\Model\Entry::getFormattedAmount()
     */
    public function testGetFormattedAmount(): void
    {
        $this->assertEquals(20.00, $this->entry->getFormattedAmount());

        $categoryIssueActive = new Category();
        $categoryIssueActive->setIssue(true);
        $this->entry->setCategory($categoryIssueActive);

        $this->assertEquals(-20.00, $this->entry->getFormattedAmount());
    }

    /**
     * @covers \CashJournal\Model\Entry::isInIssueCategory()
     */
    public function testIsInIssueCategory(): void
    {
        $this->assertEquals(false, $this->entry->isInIssueCategory());

        $categoryIssueActive = new Category();
        $categoryIssueActive->setIssue(true);
        $this->entry->setCategory($categoryIssueActive);

        $this->assertEquals(true, $this->entry->isInIssueCategory());

        $entry = new Entry();
        $this->assertEquals(false, $entry->isInIssueCategory());

    }
}