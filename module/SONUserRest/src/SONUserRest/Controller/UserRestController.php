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
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('SONUser\Entity\User');
        $data = $repo->find($id)->toArray();
        return new JsonModel(['data' => $data]);
    }

    //Insere um registro - POST
    public function create($data)
    {
        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        if($data)
        {
            $user = $userService->insert($data);
            if($user)
            {
                return new JsonModel(['data' => ['id' => $user->getId(),'success' => true]]);
            }else{
                return new JsonModel(['data' => ['success' => true]]);
            }
        }else{
            return new JsonModel(['data' => ['success' => true]]);
        }
    }

    //Alteração - PUT
    public function update($id, $data)
    {
        $data['id'] = $id;
        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        if($data)
        {
            $user = $userService->update($data);
            if($user)
            {
                return new JsonModel(['data' => ['id' => $user->getId(),'success' => true]]);
            }else{
                return new JsonModel(['data' => ['success' => true]]);
            }
        }else{
            return new JsonModel(['data' => ['success' => false]]);
        }

    }

    //Deleta - DELETE
    public function delete($id)
    {
        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        $user = $userService->delete($id);

        if($user)
        {
            return new JsonModel(['data' => ['success' => true]]);
        }else{
            return new JsonModel(['data' => ['success' => false]]);
        }
    }

}