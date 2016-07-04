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

class Role 
{
    
    /**
     *@ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
      /**
     *@ORM\oneToOne(targetEntity="SONAcl\Entity\Role")
     *@ORM\joinColumn(name="parent_id",referenceColumnName=id")
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

    function getUpdateAt() {
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
