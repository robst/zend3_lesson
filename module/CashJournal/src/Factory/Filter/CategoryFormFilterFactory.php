<?php

namespace CashJournal\Factory\Filter;

use CashJournal\Filter\CategoryFieldSetFilter;
use CashJournal\Filter\CategoryFormFilter;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryFormFilterFactory implements FactoryInterface
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
        $inputFilterPluginManager = $container->get('InputFilterManager');
        /** @var CategoryFieldSetFilter $inputFilter */
        $inputFilter = $inputFilterPluginManager->get(CategoryFieldSetFilter::class);

        $filter = new CategoryFormFilter($inputFilter);

        return $filter;
    }
}
