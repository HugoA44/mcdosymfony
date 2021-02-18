<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productmenu
 *
 * @ORM\Table(name="productMenu", indexes={@ORM\Index(name="fk_idProductMenu", columns={"idProduct"}), @ORM\Index(name="fk_idMenu", columns={"idMenu"})})
 * @ORM\Entity
 */
class Productmenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMenu", referencedColumnName="id")
     * })
     */
    private $idmenu;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduct", referencedColumnName="id")
     * })
     */
    private $idproduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdmenu(): ?Menu
    {
        return $this->idmenu;
    }

    public function setIdmenu(?Menu $idmenu): self
    {
        $this->idmenu = $idmenu;

        return $this;
    }

    public function getIdproduct(): ?Product
    {
        return $this->idproduct;
    }

    public function setIdproduct(?Product $idproduct): self
    {
        $this->idproduct = $idproduct;

        return $this;
    }


}
