<?php

namespace CashJournal\Factory\FieldSet;

use CashJournal\Form\FieldSet\CategoryFieldSet;
use CashJournal\Model\Category;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Hydrator\HydratorOptionsInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryFieldSetFactory implements FactoryInterface
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
        $fieldSet = new CategoryFieldSet();
        $fieldSet->setHydrator(
            $container->get(HydratorOptionsInterface::class)
        );
        $fieldSet->setObject(new Category());

        return $fieldSet;
    }
}