<?php

namespace CashJournal\Mapper;

use CashJournal\Model\EntityInterface;
use Zend\Db\Adapter\Driver\Pdo\Result;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\HydratorOptionsInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;

use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;

class AbstractMapper implements MapperInterface
{
    /**
     * the table name
     */
    const TABLENAME = '';

    /** @var Sql */
    protected $dbSql;

    /** @var HydratorOptionsInterface */
    protected $hydrator;

    /** @var EntityInterface */
    protected $prototype;

    /**
     * AbstractMapper constructor.
     *
     * @param Sql $dbSql
     * @param HydratorOptionsInterface $hydrator
     * @param EntityInterface $prototype
     */
    public function __construct(
        Sql $dbSql,
        HydratorOptionsInterface $hydrator,
        EntityInterface $prototype
    ) {
        $this->dbSql        = $dbSql;
        $this->hydrator     = $hydrator;
        $this->prototype    = $prototype;
    }
    /**
     * @param int|string $id
     *
     * @return EntityInterface
     * @throws \InvalidArgumentException
     */
    public function find($id)
    {
        $select = $this->dbSql->select($this->getTableName());
        $select->where(['id = ?' => $id]);

        $stmt   = $this->dbSql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        return $this->buildObject($result);
    }

    /**
     * @return array|EntityInterface[]
     */
    public function findAll()
    {
        $select = $this->dbSql->select($this->getTableName());

        $stmt   = $this->dbSql->prepareStatementForSqlObject($select);
        /** @var Result $result */
        $result = $stmt->execute();

        return $this->buildCollection($result);
    }

    /**
     * @param EntityInterface $postObject
     *
     * @return EntityInterface
     * @throws \Exception
     */
    public function save(EntityInterface $postObject)
    {
        $postData = $this->hydrator->extract($postObject);
        unset($postData['id']); // Neither Insert nor Update needs the ID in the array

        if ($postObject->getId()) {
            // ID present, it's an Update
            $action = new Update($this->getTableName());
            $action->set($postData);
            $action->where(['id = ?' => $postObject->getId()]);
        } else {
            // ID NOT present, it's an Insert
            $action = new Insert($this->getTableName());
            $action->values($postData);
        }

        $stmt   = $this->dbSql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        if ($result) {
            if ($newId = $result->getGeneratedValue()) {
                // When a value has been generated, set it on the object
                $postObject->setId($newId);
            }

            return $postObject;
        }

        throw new \Exception("Database error");
    }

    /**
     * @param EntityInterface $postObject
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(EntityInterface $postObject): bool
    {
        $action = new Delete($this->getTableName());
        $action->where(['id = ?' => $postObject->getId()]);

        $stmt   = $this->dbSql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        return (bool)$result->getAffectedRows();
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return static::TABLENAME;
    }

    /**
     * @param ResultInterface $result
     *
     * @return EntityInterface
     */
    protected function buildObject(ResultInterface $result): EntityInterface
    {
        if ($result->isQueryResult() && $result->getAffectedRows()) {
            return $this->hydrator->hydrate($result->current(), $this->prototype);
        }

        throw new \InvalidArgumentException(" Element not found.");
    }

    /**
     * @param ResultInterface $result
     *
     * @return object
     */
    protected function buildCollection(ResultInterface $result): object
    {
        $resultSet = new HydratingResultSet($this->hydrator, $this->prototype);

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            return  $resultSet->initialize($result);
        }

        return $resultSet->initialize([]);
    }
}
