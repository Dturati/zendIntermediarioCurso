<?php
namespace SONUser\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class User extends Form
{
    public function __construct($name = null) {
        parent::__construct("user");
        
       
        $this->setAttributes(array(
						'method' => 'post',
						'class' => 'form-horizontal',
				
		));
        
        $this->setInputFilter(new UserFilter());
        $this->add(array(
				'name' => 'id',
				'attributes' => array(
						'type' => 'Hidden'
				)
	));
        
        $nome = New \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome:')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);
        
        $email = New \Zend\Form\Element\Text('email');
        $email->setLabel('Email:')
                ->setAttribute('placeholder', 'Entre com o email');
        $this->add($email);
        
        $password = New \Zend\Form\Element\Password('password');
        $password->setLabel('Password:')
                ->setAttribute('placeholder', 'Entre com o password');
        $this->add($password);
        
        $confirmation = new \Zend\Form\Element\Password('confirmation');
        $confirmation->setLabel("Redigite")
                ->setAttribute("placeholder", "Redigite a senha");
                $this->add($confirmation);
                
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->add(array(
            'name'   => 'submit',
            'type'  =>  'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' =>  'Salvar',
                'class' =>  'btn btn-success',
            )   
        ));
        
    }
           
}
