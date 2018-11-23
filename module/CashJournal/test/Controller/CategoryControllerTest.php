<?php

namespace ApplicationTest\Controller;

use CashJournal\Controller\CategoryController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class CategoryControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/category', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('CashJournal');
        $this->assertControllerName(CategoryController::class); // as specified in router's controller name alias
        $this->assertControllerClass('CategoryController');
        $this->assertMatchedRouteName('categories');
    }

    public function testAddActionCanBeAccessed()
    {
        $this->dispatch('/category/add', 'GET');
        $this->assertResponseStatusCode(200);
    }

}
