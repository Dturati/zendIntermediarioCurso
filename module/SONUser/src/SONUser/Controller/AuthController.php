<?php

namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService,
 Zend\Authentication\Storage\Session as SessionStorege;

use SONUser\Form\Login as LoginForm;

class AuthController extends AbstractActionController
{
    public function indexAction() 
    {
       $form = new LoginForm();
       $request = $this->getRequest();
       $error  = false;
       if($request->isPost())
       {
           $form->setData($request->getPost());
           
           if($form->isValid())
           {
               $data = $request->getPost()->toArray();
               
                //criando storage para gravar sessão da autenticação
               $sessionStorage = new SessionStorege('SONUser');
               
               $auth = new AuthenticationService();
               
               $auth->setStorage($sessionStorage); //Definindo o session storage para a auth
               
               $authAdapater = $this->getServiceLocator()->get('SONUser\Auth\Adapter');
               $authAdapater->setUsername($data['email']);
               $authAdapater->setPassword($data['password']);
          
               $result = $auth->authenticate($authAdapater);
               
               if($result->isValid())
               {
                   $sessionStorage->write($auth->getIdentity()['user'],null);
                   return $this->redirect()->toRoute('sonuser-admin/default',array('controller'=>'users'));
               }else{
                  
                   $error = true;
               }
           }
           
       }
       return new ViewModel(array('form' => $form, 'error' => $error));
    }
    
    public function logoutAction()
    {
        $auth = new AuthenticationService(new SessionStorege('SONUser'));
        $auth->clearIdentity();
        return $this->redirect()->toRoute('sonuser-auth');
    }
}
