<?php

namespace HDIV\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $orderId;

    /**
     * @ORM\Column(type="text")
     */
    protected $orderDate;

    /**
     * @ORM\Column(type="text")
     */
    protected $shippingAddress;

    /**
     * @ORM\Column(type="text")
     */
    protected $amount;

    /**
     * @ORM\Column(type="text")
     */
    protected $user;

    /**
     * @ORM\Column(type="text")
     */
    protected $company;


    /**
     * @ORM\Column(type="text")
     */
    protected $bankAccount;


    /**
     * @ORM\Column(type="text")
     */
    protected $email;


    /**
     * @ORM\Column(type="text")
     */
    protected $phone;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set orderDate
     *
     * @param string $orderDate
     * @return Order
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return string 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set shippingAddress
     *
     * @param string $shippingAddress
     * @return Order
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * Get shippingAddress
     *
     * @return string 
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Order
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set userId
     *
     * @param string $userId
     * @return Order
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Order
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Order
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Order
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set creditCard
     *
     * @param string $creditCard
     * @return Order
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    /**
     * Get creditCard
     *
     * @return string 
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Order
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set bankAccount
     *
     * @param string $bankAccount
     * @return Order
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }
}
