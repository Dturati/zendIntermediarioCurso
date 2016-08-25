<?php
namespace SONAcl\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Resource extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('resource');
        
        $this->setAttribute('method', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
       $nome = new \Zend\Form\Element\Text("nome"); 
        $nome->setLabel("Nome:")
                ->setAttribute("placeholder", "Entre com no nome");
        $this->add($nome);
        
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
