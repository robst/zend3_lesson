<?php

namespace CashJournal\Factory\Controller;

use CashJournal\Controller\EntryController;
use CashJournal\Form\EntryForm;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use CashJournal\Model\Entry;

class EntryControllerFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     *
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $form = $container->get('FormElementManager')->get(EntryForm::class);
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(Entry::class);

        $controller = new EntryController(
            $entityManager,
            $repository,
            $form
        );

        return $controller;
    }
}
