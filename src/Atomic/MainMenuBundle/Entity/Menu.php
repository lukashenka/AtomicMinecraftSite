<?php

namespace Atomic\MainMenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="atomic_menu")
 */
class Menu {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $route;
    
    /**
     * @var string
     */
    private $exlink;

    /**
     * @var integer
     */
    private $ordering;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Menu
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Menu
     */
    public function setRoute($route) {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute() {
        return $this->route;
    }
    
    /**
     * Set exlink
     *
     * @param string $exlink
     * @return Menu
     */
    public function setExlink($exlink) {
        $this->exlink = $exlink;

        return $this;
    }

    /**
     * Get exlink
     *
     * @return string 
     */
    public function getExlink() {
        return $this->exlink;
    }

    /**
     * Set ordering
     *
     * @param integer ordering
     * @return Menu
     */
    public function setOrdering($ordering) {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering() {
        return $this->ordering;
    }

}
