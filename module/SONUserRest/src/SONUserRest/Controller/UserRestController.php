<?php
namespace SONUserRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class UserRestController extends AbstractRestfulController
{
    //Listar
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('SONUser\Entity\User');
        $data = $repo->findArray();
        return new JsonModel(['data' => $data]);
    }

    //Retorna um registro especifico - GET
    public function get($id)
    {
        return new JsonModel();
    }

    //Insere um registro - POST
    public function create($data)
    {

    }

    //Alteração - PUT
    public function update($id, $data)
    {

    }

    //Deleta - DELETE
    public function delete($id)
    {

    }

}