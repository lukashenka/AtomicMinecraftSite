<?php

namespace Atomic\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Atomic\UserBundle\Entity\Repository\UserRepository") 
 * @ORM\Table(name="atomic_user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {

        $this->groups = new ArrayCollection();
        $this->setRegistered(new \DateTime());
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\OneToMany(targetEntity="Atomic\BlogBundle\Entity\Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="Atomic\ShopBundle\Entity\Transaction", mappedBy="user")
     */
    protected $transactions;

    /**
     * @ORM\OneToOne(targetEntity="Atomic\UserBundle\Entity\Cloack", mappedBy="user")
     */
    protected $cloak;

    /**
     * @ORM\OneToOne(targetEntity="Atomic\UserBundle\Entity\Skin", mappedBy="user")
     */
    protected $skin;

    /**
     * @ORM\ManyToMany(targetEntity="Atomic\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="atomic_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    public function getGroups() {
        return $this->groups;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,options={"default" = 42},nullable=true)
     */
    protected $coins;

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,nullable=true)
     */
    protected $sesId;

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,nullable=true)
     */
    protected $serverId;

    /**
     * @var boolean
     * @ORM\Column(type="boolean",nullable=true)
     */
    protected $banned;

    /**
     * @var int
     * @ORM\Column(name="`right`",type="integer", length=11,nullable=true)
     */
    protected $right;

    /**
     * @var int
     * @ORM\Column(name="`group`",type="integer", length=11,nullable=true)
     */
    protected $group;

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,nullable=true)
     */
    protected $duration;

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,nullable=true)
     */
    protected $money;

    /**
     * @var int
     * @ORM\Column(type="integer", length=255,nullable=true)
     */
    protected $ban_count;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $registered;

    public function getSessId() {
        return $this->sessId;
    }

    public function setSessId($sessId) {
        $this->sessId = $sessId;
    }

    public function getServerId() {
        return $this->serverId;
    }

    public function setServerId($servId) {
        $this->serverId = $servId;
    }

    public function getRights() {
        return $this->right;
    }

    public function setRight($right) {
        $this->right = $right;
    }

    public function isBanned() {
        return $this->banned;
    }

    public function setBanned($status) {
        $this->banned = $status;
    }

    public function getGroup() {
        return $this->group;
    }

    public function setGroup($group) {
        $this->group = $group;
    }

    public function getCoins() {
        return $this->money;
    }

    public function setCoins($value) {
        $this->money = $value;
    }

    /**
     * Set created
     *
     * @param \DateTime $registered
     * @return Blog
     */
    public function setRegistered($registered) {
        $this->registered = $registered;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getRegistered() {
        return $this->registered;
    }

    public function getTransactions() {
        return $this->transactions;
    }
    
    public function getSkin()
    {
        return $this->skin;
    }
    
    public function getCloack()
    {
        return $this->cloak;
    }

}