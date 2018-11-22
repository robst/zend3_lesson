<?php

namespace CashJournal\Controller;

use CashJournal\Model\EntityInterface;
use Zend\Mvc\Controller\AbstractActionController as ZendMvcController;
use CashJournal\Util\ObjectManagerTrait;
use CashJournal\Util\RepositoryTrait;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Zend\Form\Form;
use Zend\Http\Response;

class AbstractActionController extends ZendMvcController implements ObjectManagerAwareInterface
{
    use ObjectManagerTrait, RepositoryTrait;

    /**
     * @var Form
     */
    protected $form;

    /**
     * CategoryController constructor.
     *
     * @param EntityManager    $entityManager
     * @param ObjectRepository $repository
     * @param Form             $form
     */
    public function __construct(EntityManager $entityManager, ObjectRepository $repository, Form $form)
    {
        $this->setObjectManager($entityManager);
        $this->setRepository($repository);
        $this->form = $form;
    }

    /**
     * @param string $nameOfRoute
     *
     * @return Response
     */
    public function redirectToRoute(string $nameOfRoute): Response
    {
        return $this->redirect()->toRoute($nameOfRoute);
    }

    /**
     * @param int $id
     *
     * @return EntityInterface
     */
    public function loadEntity(int $id): EntityInterface
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param EntityInterface $entity
     */
    public function persistEntityData(EntityInterface $entity)
    {
        $this->getObjectManager()->persist($entity);
        $this->getObjectManager()->flush();
    }

    /**
     * @param EntityInterface $entity
     */
    public function removeEntity(EntityInterface $entity)
    {
        $this->getObjectManager()->remove($entity);
        $this->getObjectManager()->flush();
    }
}
