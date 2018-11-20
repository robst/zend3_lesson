<?php

namespace CashJournal\Factory\Controller;

use CashJournal\Controller\EntryController;
use CashJournal\Form\EntryForm;
use CashJournal\Mapper\EntryMapper;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

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
        // TODO
        $form = $container->get('FormElementManager')->get(EntryForm::class);

        return new EntryController(
            $container->get(EntryMapper::class),
            $form
        );
    }
}
