<?php

namespace CashJournal\Factory\Form;

use CashJournal\Filter\CategoryFieldSetFilter;
use CashJournal\Filter\CategoryFormFilter;
use CashJournal\Form\CategoryForm;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Hydrator\HydratorOptionsInterface;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryFormFactory implements FactoryInterface
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
        /** @var InputFilterPluginManager $inputFilterPluginManager */
        $inputFilterPluginManager = $container->get('InputFilterManager');
        $inputFilter = $inputFilterPluginManager->build(CategoryFormFilter::class);

        $form = new CategoryForm();
        $form->setInputFilter($inputFilter); // The setter injection you're after

        return $form;
    }
}
