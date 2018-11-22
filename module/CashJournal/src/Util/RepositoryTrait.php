<?php

namespace CashJournal\Util;

use Doctrine\Common\Persistence\ObjectRepository;

trait RepositoryTrait
{
    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        return $this->repository;
    }

    /**
     * @param ObjectRepository $repository
     */
    public function setRepository(ObjectRepository $repository): void
    {
        $this->repository = $repository;
    }
}
