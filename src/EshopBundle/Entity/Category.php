<?php

namespace EshopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 *
 * @package EshopBundle\Entity
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $url;

    /**
     * Nadrazena kategorie
     *
     * @ORM\OneToOne(targetEntity="EshopBundle\Entity\Category", mappedBy="category")
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="EshopBundle\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        // jelikoz je vazba 1:N, tak se produkty chovaji jako pole - je nutne je tak take ukladat a pracovat s nimi
        $this->products = new ArrayCollection();
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
     * @return Category
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
     * @return Category
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
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Category
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Category
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     * @return Category
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}