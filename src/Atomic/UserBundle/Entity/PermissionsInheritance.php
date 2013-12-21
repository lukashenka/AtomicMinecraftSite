<?php

namespace Atomic\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PermissionsInheritance
 *
 * @ORM\Table(name="permissions_inheritance")
 * @ORM\Entity(repositoryClass="Atomic\UserBundle\Entity\PermissionsInheritanceRepository")
 */
class PermissionsInheritance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="child", type="string", length=50)
     */
    private $child;

    /**
     * @var string
     *
     * @ORM\Column(name="parent", type="string", length=50,nullable=true)
     */
    private $parent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean",nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="world", type="string", length=50,nullable=true)
     */
    private $world;


     /**
     * @ORM\Column(type="datetime",nullable=true)
     */
     private $expired;
     
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set child
     *
     * @param string $child
     * @return PermissionsInheritance
     */
    public function setChild($child)
    {
        $this->child = $child;
    
        return $this;
    }

    /**
     * Get child
     *
     * @return string 
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set parent
     *
     * @param string $parent
     * @return PermissionsInheritance
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return string 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set type
     *
     * @param boolean $type
     * @return PermissionsInheritance
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set world
     *
     * @param string $world
     * @return PermissionsInheritance
     */
    public function setWorld($world)
    {
        $this->world = $world;
    
        return $this;
    }

    /**
     * Get world
     *
     * @return string 
     */
    public function getWorld()
    {
        return $this->world;
    }
    
    public function setExpired($expired)
    {
        $this->expired =$expired;
    }
    
    public function getExpired()
    {
        return $this->expired;
    }

    public function getStatus()
    {
        switch ($this->parent)
        {
            case "vip":
                return "Vip - игрок";
            case "premium" :
                return "Премиум - игрок";
            case "admin" :
                return "Администратор";
           case "moder" :
                return "Модератор";
           case "editor" :
                return "Креатив";    
           case "default" :
                return "Простой смертный";        
                
            default :
                return "Неизвестный игрок";
        }
    }
}
