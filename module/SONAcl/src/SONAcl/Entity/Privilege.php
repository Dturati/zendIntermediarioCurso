<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_privileges")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\PrivilegeRepository")
 */

class Privilege 
{  
    /**
     *@ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     *@ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     * @ORM\JoinColumn(name="role_id",referencedColumnName="id")
     */
    protected $role;
    
      /**
     *@ORM\OneToOne(targetEntity="SONAcl\Entity\Resource")
     * @ORM\joinColumn(name="resource_id",referencedColumnName="id")
     */
    protected $resource;

    
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
     * @ORM\Column(type="datetime",name="update_at")
     */
    protected $updateAt;
    
    public function __construct($options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->createdAt = new \DateTime('now');
        $this->updateAt = new \DateTime('now');
        
    }
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }
    
    function getRole() {
        return $this->role;
    }

    function getResource() {
        return $this->resource;
    }

    function setRole($role) {
        $this->role = $role;
        return $this;
    }

    function setResource($resource) {
        $this->resource = $resource;
        return $this;
    }

        
    function getIs_admin() {
        return $this->is_admin;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdateAt() {
        return $this->updateAt;
    }

    function setId($id) {
        $this->id = $id;
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
    function setUpdateAt() {
        $this->updateAt = new \DateTime('now');
        return $this;
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
