<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_roles")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\RoleRepository")
 */

//Entidades sempre no singular
class Role 
{
   
    /**
     *@ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
      /**
     *@ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     *@ORM\JoinColumn(name="parent_id",referencedColumnName="id")
     */
    protected $parent;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="boolean",name="is_admin")
     * @var boolean
     */
    protected $is_admin;
    
     /**
     * @ORM\Column(type="datetime",name="created_at")
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="datetime",name="updated_at")
     */
    protected $updatedAt;
    
    public function __construct($options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->createdAt = new \DateTime('now');
        $this->updateAt = new \DateTime('now');
        
    }
    
    
    function getId() {
        return $this->id;
    }

    function getParent() {
        return $this->parent;
    }

    function getNome() {
        return $this->nome;
    }

    function getIs_admin() {
        return $this->is_admin;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdatedAt() {
        return $this->updateAt;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
        return $this;
    }

    function setCreatedAt() {
        $this->createdAt = new \DateTime('now');
        return $this;
    }


    //Pegar a alteração antes de persistir os dados
    /**
     * @ORM\PrePersist
     */
    function setUpdatedAt() {
        $this->updateAt = new \DateTime('now');
        return $this;
    }
    

    public function __toString()
    {
       return $this->nome;
    }

    public function toArray()
    {
     if(isset($this->parent)){
                 $parent = $this->getId();
             }else{
                 $this->parent = false;
             }
     
             return array(
                'id'        => $this->id,
                'nome'      => $this->nome,
                'isAdmin'   => $this->is_admin,
                'parent'    => $this->parent
             );
    }


}
