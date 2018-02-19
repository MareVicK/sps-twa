<?php

namespace EshopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Discount
 *
 * @package EshopBundle\Entity
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\DiscountRepository")
 */
class Discount
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $percentage;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean")
     */
    private $applied;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $valid_to;

    /**
     * @ORM\OneToMany(targetEntity="EshopBundle\Entity\Order", mappedBy="discount")
     */
    private $order;

    /**
     * Discount constructor.
     */
    public function __construct()
    {
        // jelikoz jednu slevu muze mit X objednavek, pak je nutne s hodnotou pracovat jako s polem
        $this->order = new ArrayCollection();
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
     * @return Discount
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
     * @return Discount
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Discount
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     * @return Discount
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Discount
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApplied()
    {
        return $this->applied;
    }

    /**
     * @param mixed $applied
     * @return Discount
     */
    public function setApplied($applied)
    {
        $this->applied = $applied;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidTo()
    {
        return $this->valid_to;
    }

    /**
     * @param mixed $valid_to
     * @return Discount
     */
    public function setValidTo($valid_to)
    {
        $this->valid_to = $valid_to;
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
     * @return Discount
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }
}