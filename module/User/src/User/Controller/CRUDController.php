<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CRUDController extends AbstractActionController {

    public function getEm() {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function listAction() {

        $collection = $this->getEm()
                ->getRepository('User\Entity\User')
                ->findAll();

        return new ViewModel([
            'collection' => $collection
        ]);
    }

    public function updateAction() {
        $id = (int) $this->params()->fromRoute('id', 0);

        if ($id == 0) {
            return $this->redirect()->toRoute('generic', ['controller' => 'crud', 'action' => 'list']);
        }

        $user = $this->getEm()->find('User\Entity\User', $id);

        $user->setEmail("john@" . \time() . ".com.br");
        $user->setPassword(\time());

        $this->getEm()->merge($user);
        $this->getEm()->flush();


        return $this->redirect()->toRoute('generic', ['controller' => 'crud', 'action' => 'list']);
    }

    public function insertAction() {


        $user = new \User\Entity\User([
            'username' => '38735190892',
            'password' => 'teste',
            'email' => 'teste@teste.com.br',
            'ip' => '192.168.1.17',
            'lastLogin' => new \DateTime('now')
        ]);

        $user2 = clone $user;
        $user2->setUsername('1456714856');

        $user3 = clone $user;
        $user3->setUsername('16608497806

        ');

        $this->getEm()->persist($user);
        $this->getEm()->persist($user2);
        $this->getEm()->persist($user3);

        $this->getEm()->flush();

        return $this->redirect()->toRoute('generic', ['controller' => 'crud', 'action' => 'list']);
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', null);
        $user = $this->getEm()->find('User\Entity\User', $id);

        if (!$user instanceof \User\Entity\User) {
            return $this->redirect()->toRoute('generic', ['controller' => 'crud', 'action' => 'list']);
        }



        $this->getEm()->remove($user);
        $this->getEm()->flush();


        return $this->redirect()->toRoute('generic', ['controller' => 'crud', 'action' => 'list']);
    }

}
