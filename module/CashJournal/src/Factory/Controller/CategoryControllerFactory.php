<?php

namespace CashJournal\Factory\Controller;

use CashJournal\Form\CategoryForm;
use CashJournal\Mapper\CategoryMapper;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use CashJournal\Controller\CategoryController;

class CategoryControllerFactory implements FactoryInterface
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
        $form = $container->get('FormElementManager')->get(CategoryForm::class);

        return new CategoryController(
            $container->get(CategoryMapper::class),
            $form
        );
    }
}
