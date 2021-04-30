<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arancel
 *
 * @ORM\Table(name="arancel", indexes={@ORM\Index(name="IDX_504E145C209282A9", columns={"um"}), @ORM\Index(name="IDX_504E145C2BA5E28F", columns={"capitulo"})})
 * @ORM\Entity
 */
class Arancel
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
     * @var string
     *
     * @ORM\Column(name="articulos", type="text", length=0, nullable=false)
     */
    private $articulos;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="arancel", type="float", precision=10, scale=0, nullable=false)
     */
    private $arancel;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", length=0, nullable=false)
     */
    private $observaciones;

    /**
     * @var \Um
     *
     * @ORM\ManyToOne(targetEntity="Um")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="um", referencedColumnName="id")
     * })
     */
    private $um;

    /**
     * @var \Capitulo
     *
     * @ORM\ManyToOne(targetEntity="Capitulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="capitulo", referencedColumnName="id")
     * })
     */
    private $capitulo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticulos(): ?string
    {
        return $this->articulos;
    }

    public function setArticulos(string $articulos): self
    {
        $this->articulos = $articulos;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getArancel(): ?float
    {
        return $this->arancel;
    }

    public function setArancel(float $arancel): self
    {
        $this->arancel = $arancel;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getUm(): ?Um
    {
        return $this->um;
    }

    public function setUm(?Um $um): self
    {
        $this->um = $um;

        return $this;
    }

    public function getCapitulo(): ?Capitulo
    {
        return $this->capitulo;
    }

    public function setCapitulo(?Capitulo $capitulo): self
    {
        $this->capitulo = $capitulo;

        return $this;
    }


}
