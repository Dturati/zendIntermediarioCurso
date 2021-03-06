<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_resources")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\ResourceRepository")
 */

class Resource 
{
    
    /**
     *@ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    
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


    function setCreatedAt() {
        $this->createdAt = new \DateTime('now');
        return $this;
    }
    
    /**
     * @ORM\PrePersist
     */
    function setUpdateAt() {
        $this->updateAt = new \DateTime('now');
        return $this;
    }
    

    public function toArray()
    {
          return   (new Hydrator\ClassMethods)->extract($this);
    }


}
