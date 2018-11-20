<?php

namespace CashJournal\Controller;

use CashJournal\Mapper\MapperInterface;
use CashJournal\Model\Entry;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;

class EntryController extends AbstractActionController
{
    /**
     * @var MapperInterface
     */
    protected $mapper;

    /**
     * @var Form
     */
    protected $form;

    /**
     * CategoryController constructor.
     *
     * @param MapperInterface $mapper
     * @param Form            $form
     */
    public function __construct(MapperInterface $mapper, Form $form)
    {
        $this->mapper = $mapper;
        $this->form = $form;
    }

    /**
     * @return array
     */
    public function indexAction(): array
    {
        return [
            'entries' => $this->mapper->findAll()
        ];
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $this->mapper->save($this->form->getData());

                $this->redirect()->toRoute('entries');
            }
        }

        return [
            'form' => $this->form
        ];
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    public function editAction()
    {
        $request = $this->getRequest();

        /** @var Entry $category */
        $entry = $this->mapper->find($this->params('id'));
        $this->form->bind($entry);

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $this->mapper->save($this->form->getData());
                $this->redirect()->toRoute('entries');
            }
        }

        return [
            'form' => $this->form
        ];
    }


    public function deleteAction()
    {
        $category = $this->mapper->find($this->params('id'));

        $this->mapper->delete($category);

        $this->redirect()->toRoute('categories');
    }
}
