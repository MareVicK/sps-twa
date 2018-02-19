<?php

namespace EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderProduct
 *
 * @package EshopBundle\Entity
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\OrderProductRepository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="order_product", columns={"product", "order"})})
 *          - prida unikatnost - tzn. v tabulce nebude mozne mit vickrat stejny produkt pro danou objednavku a opacne
 *          - NENI POVINNE!
 */
class OrderProduct
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\Product", inversedBy="order_product")
     * @ORM\JoinColumn(referencedColumnName="id", name="product")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\Order", inversedBy="order_product")
     * @ORM\JoinColumn(referencedColumnName="id", name="order")
     */
    private $order;

    /**
     * Mnozstvi daneho produktu v objednavce
     *
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return OrderProduct
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     * @return OrderProduct
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     * @return OrderProduct
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return OrderProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}