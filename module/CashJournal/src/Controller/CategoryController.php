<?php

namespace CashJournal\Controller;

use CashJournal\Model\Category;
use \Zend\Http\Response;

class CategoryController extends AbstractActionController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {
        return [
            'categories' => $this->getRepository()->findAll()
        ];
    }

    /**
     * @return array|Response
     *
     * @throws \Exception
     */
    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                try {
                    $this->persistEntityData($this->form->getData());

                    return $this->redirectToRoute('categories');
                } catch (\Exception $e) {
                }
            }
        }

        return [
            'form' => $this->form
        ];
    }

    /**
     * @return array|Response
     *
     * @throws \Exception
     */
    public function editAction()
    {
        $request = $this->getRequest();

        /** @var Category $category */
        $category = $this->loadEntity($this->params('id'));
        $this->form->bind($category);

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                try {
                    $this->persistEntityData($this->form->getData());

                    return $this->redirectToRoute('categories');
                } catch (\Exception $e) {
                }
            }
        }

        return [
            'form' => $this->form
        ];
    }

    /**
     * @return Response
     */
    public function deleteAction()
    {
        $category = $this->loadEntity($this->params('id'));
        $this->removeEntity($category);

        return $this->redirectToRoute('categories');
    }
}
