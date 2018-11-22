<?php

namespace CashJournal\Controller;

use CashJournal\Model\Entry;
use \Zend\Http\Response;

class EntryController extends AbstractActionController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {
        return [
            'entries' => $this->getRepository()->findAll()
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

                    return $this->redirectToRoute('entries');
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

        /** @var Entry $category */
        $entry = $this->loadEntity($this->params('id'));
        $this->form->bind($entry);

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                try {
                    $this->persistEntityData($this->form->getData());

                    return $this->redirectToRoute('entries');
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
        $entry = $this->loadEntity($this->params('id'));
        $this->removeEntity($entry);

        return $this->redirectToRoute('entries');
    }
}
