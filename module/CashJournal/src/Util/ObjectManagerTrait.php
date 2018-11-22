<?php

namespace CashJournal\Util;

use Doctrine\Common\Persistence\ObjectManager;

trait ObjectManagerTrait
{
    /**
     * @var
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @return ObjectManager
     */
    public function getObjectManager(): ObjectManager
    {
        return $this->objectManager;
    }
}
