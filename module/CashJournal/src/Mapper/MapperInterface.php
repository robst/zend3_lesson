<?php

namespace CashJournal\Mapper;

use CashJournal\Model\EntityInterface;

interface MapperInterface
{
    /**
     * @param  int|string $id
     * @return EntityInterface
     * @throws \InvalidArgumentException
     */
    public function find($id);

    /**
     * @return array|EntityInterface[]
     */
    public function findAll();

    /**
     * @param EntityInterface $postObject
     *
     * @return EntityInterface
     * @throws \Exception
     */
    public function save(EntityInterface $postObject);

    /**
     * @param EntityInterface $postObject
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(EntityInterface $postObject);
}
