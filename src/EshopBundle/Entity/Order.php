<?php

namespace EshopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 *
 * pozn. Zde data o uzivatei duplikujeme - musime, at uz kvuli fakture, nebo z duvodu, ze si necha balik zaslat na jinou
 * adresu nebo jej na stejne adrese prevezme nekdo jiny
 *
 * @package EshopBundle\Entity
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $order_date;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price;

    /**
     * @ORM\Column(type="text")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="EshopBundle\Entity\OrderProduct", mappedBy="order")
     */
    private $order_product;

    /**
     * V praxi je lepsi udelat specialni tabulku stavu a tabulku M:N - stavy a objednavky - potom bude mozne sledovat
     * jednotlive objednavky, jakych nabyvaly stavu v case
     *
     * @ORM\Column(type="string", length=32)
     */
    private $state;

    /**
     * Pokud je uzivatel prihlaseny, muzeme si zapamatovat, ze jde o nej
     * - NENI POVINNE!
     *
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\User", inversedBy="order")
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\Discount", inversedBy="order")
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     */
    private $discount;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        // Jelikoz k objednavce muze pribyt vice produktu, tak je nutne pracovat s promennou jako s polem
        $this->order_product = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $order_date
     * @return Order
     */
    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     * @return Order
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return Order
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Order
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Order
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     * @return Order
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return Order
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Order
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderProduct()
    {
        return $this->order_product;
    }

    /**
     * @param mixed $order_product
     * @return Order
     */
    public function setOrderProduct($order_product)
    {
        $this->order_product = $order_product;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Order
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }
}