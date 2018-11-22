<?php

namespace CashJournal\Mapper;

use CashJournal\Model\EntityInterface;
use Doctrine\ORM\EntityManager;
use Exception;

class AbstractMapper implements MapperInterface
{
    /** @var EntityManager */
    protected $entityManager;

    /** @var string */
    protected $entityClassName;

    /**
     * @var Exception
     */
    protected $exception;

    /**
     * AbstractMapper constructor.
     *
     * @param EntityManager $objectManager
     * @param string $entityClassName
     */
    public function __construct(EntityManager $objectManager, string $entityClassName)
    {
        $this->entityManager    = $objectManager;
        $this->entityClassName  = $entityClassName;
    }
    /**
     * @param int|string $id
     *
     * @return EntityInterface
     *
     * @throws \InvalidArgumentException
     */
    public function find($id): object
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @return array|EntityInterface[]
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * @param EntityInterface $postObject
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function save(EntityInterface $postObject): bool
    {
        try {
            $this->entityManager->persist($postObject);
            $this->entityManager->flush();
        } catch (Exception $e) {
            $this->setException($e);
            return false;
        }

        return true;
    }

    /**
     * @param EntityInterface $postObject
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function delete(EntityInterface $postObject): bool
    {
        try {
            $this->entityManager->remove($postObject);
            $this->entityManager->flush();
        } catch (Exception $e) {
            $this->setException($e);
            return false;
        }

        return true;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository
     */
    protected function getRepository()
    {
        return $this->entityManager->getRepository($this->entityClassName);
    }

    /**
     * @param Exception $e
     */
    protected function setException(Exception $e)
    {
        $this->exception = $e;
    }

    /**
     * @return Exception
     */
    public function getException(): ?Exception
    {
        return $this->exception;
    }

    public function getExceptionMessage(): string
    {
        $exception = $this->getException();

        if (null === $exception) {
            return '';
        }

        return $exception->getMessage();
    }
}
