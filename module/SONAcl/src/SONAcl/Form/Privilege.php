<?php
namespace SONAcl\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

//Se tem dependência precisa resgistrar como serviço
class Privilege extends Form {
    protected $roles;
    protected $resources;
    
    public function __construct($name = null, array $roles = null, array $resources = null)
    {
        parent::__construct($name);
        $this->$resources = $resources;
        $this->roles = $roles;
        
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden("id");
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text("nome"); 
        $nome->setLabel("Nome:")
                ->setAttribute("placeholder", "Entre com no nome");
        $this->add($nome);
        
   
        $role = new Select();
        $role->setLabel("Role:")
                ->setName("role")
                ->setOptions(array('value_options' => $roles));
        $this->add($role);  
        
        
        $resource = new Select();
        $resource->setLabel("Resource: ")
                ->setName("resource")
                ->setOptions(array('value_options' => $resources));
        $this->add($resource); 
        
        
        $this->add(array(
            'name'   => 'submit',
            'type'  => 'Zend\Form\Element\Submit',
            'attributes'    =>  array(
                'value'    => 'Salvar',
                'class'     => 'btn btn-sucess'
            )
        ));
         
    }
}
