<?php

namespace Atomic\ShopBundle\Entity;

use Atomic\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="atomic_transaction")
 * @ORM\Entity(repositoryClass="Atomic\ShopBundle\Entity\TransactionRepository")
 */
class Transaction {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ik_id", type="integer",nullable=true)
     */
    private $ikId;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint",nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="money", type="integer")
     */
    private $money;

    /**
     * @ORM\ManyToOne(targetEntity="Atomic\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function getUser() {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ikId
     *
     * @param integer $ikId
     * @return Transaction
     */
    public function setIkId($ikId) {
        $this->ikId = $ikId;

        return $this;
    }

    /**
     * Get ikId
     *
     * @return integer 
     */
    public function getIkId() {
        return $this->ikId;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Transaction
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set money
     *
     * @param integer $money
     * @return Transaction
     */
    public function setMoney($money) {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return integer 
     */
    public function getMoney() {
        return $this->money;
    }

}
