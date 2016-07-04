<?php
namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController,
 Zend\View\Model\ViewModel;
use SONUser\Form\User;

class IndexController extends AbstractActionController {
  
    public function registerAction(){
        $form = new User();
        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setData($request->getPost());
            if($form->isValid()){
                $service = $this->getServiceLocator()->get('SONUser\Service\User');
                if($service->insert($request->getPost()->toArray()))
                {
                    $fm = $this->flashMessenger()->setNamespace('SONUser')->addMessage('Ususário cadastrado');
                }
                
                return $this->redirect()->toRoute('sonuser-register');
            }
        }
        $messages = $this->flashMessenger()->setNamespace('SONUser')->getMessages();
        
        return new ViewModel(['form' => $form, 'messages' => $messages]);
    }
    
    public function activateAction()
    {
        
        $actiovation = $this->params()->fromRoute('key');
        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        $result = $userService->activate($actiovation);
        
        if($result)
        {
            return new ViewModel(['user' => $result]);
        }else{
            return new ViewModel();
        }
    }
       
}
