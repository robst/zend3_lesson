<?php

namespace CashJournal\Factory\Mapper;

use CashJournal\Mapper\CategoryMapper;
use CashJournal\Model\Category;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\Sql\Sql;
use Zend\Hydrator\HydratorOptionsInterface;

class CategoryMapperFactory implements FactoryInterface
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
        return new CategoryMapper(
            $container->get(Sql::class),
            $container->get(HydratorOptionsInterface::class),
            new Category()
        );
    }
}
