<?php

namespace CashJournal\Test;

use CashJournal\Model\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /** @var Category */
    protected $category;

    public function setUp(): void
    {
        $this->category = new Category();
        $this->category->setName('hallo');
    }

    /**
     * @covers \CashJournal\Model\Category::getName()
     */
    public function testGetName(): void
    {
        $this->assertEquals('hallo', $this->category->getName());
    }

    /**
     * @covers \CashJournal\Model\Category::getIssue()
     */
    public function testGetIssue(): void
    {
        $this->assertEquals(false, $this->category->getIssue());
    }

    /**
     * @covers \CashJournal\Model\Category::toString()
     */
    public function testToString(): void
    {
        $this->assertEquals('hallo', $this->category);
    }

    /**
     * @covers \CashJournal\Model\Category::getEntries()
     */
    public function testgetEntries(): void
    {
        $this->assertEquals(null, $this->category->getEntries());
    }
}