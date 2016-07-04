<?php
namespace SONUser\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class Login extends Form
{
    public function __construct($name = null) {
        parent::__construct("login");
        
       
        $this->setAttributes(array(
						'method' => 'post',
						'class' => 'form-horizontal',
				
		));
       
        
        
        $email = New \Zend\Form\Element\Text('email');
        $email->setLabel('Email:')
                ->setAttribute('placeholder', 'Entre com o email');
        $this->add($email);
        
        $password = New \Zend\Form\Element\Password('password');
        $password->setLabel('Password:')
                ->setAttribute('placeholder', 'Entre com o password');
        $this->add($password);
        
        
        $this->add(array(
            'name'   => 'submit',
            'type'  =>  'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' =>  'Logar',
                'class' =>  'btn btn-success',
            )   
        ));
        
    }
           
}
