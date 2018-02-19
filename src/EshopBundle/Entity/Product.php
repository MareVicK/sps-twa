<?php

namespace EshopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Product
 *
 * @author prokop
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\ProductRepository")
 */
class Product {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $url;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="EshopBundle\Entity\OrderProduct", mappedBy="product")
     */
    private $order_product;

    /**
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", nullable=true, referencedColumnName="id")
     */
    private $category;

    /**
     * Signalizuje, zda je produkt aktivni nebo je v kosi
     * V options je mozne nastavit vychozi hodnotu, pokud ji uzivatel v administraci nezada, tak bude doplnena
     *
     * @ORM\Column(type="boolean", options={"default": true})
     */
    private $active;

    /**
     * V options je mozne nastavit vychozi hodnotu, pokud ji uzivatel v administraci nezada, tak bude doplnena
     *
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private $stock;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        // Jelikoz produkt muze byt ve vice objednavkach, tak je nutne s nim pracovat jako s polem
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
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return Product
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
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
     * @return Product
     */
    public function setOrderProduct($order_product)
    {
        $this->order_product = $order_product;
        return $this;
    }
}
