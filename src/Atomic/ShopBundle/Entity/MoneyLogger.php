<?php

namespace Atomic\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MoneyLogger
 *
 * @ORM\Table(name="atomic_money_logger")
 * @ORM\Entity(repositoryClass="Atomic\ShopBundle\Entity\MoneyLoggerRepository")
 */
class MoneyLogger {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Atomic\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="bigint")
     */
    private $value;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return MoneyLogger
     */
    public function setUser(\Atomic\UserBundle\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set type
     *
     * @param array string
     * @return MoneyLogger
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return MoneyLogger
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return MoneyLogger
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue() {
        return $this->value;
    }

}
