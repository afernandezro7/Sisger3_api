<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mercancia
 *
 * @ORM\Table(name="mercancia", indexes={@ORM\Index(name="IDX_1FF8C8436555E543", columns={"miRelacionada"}), @ORM\Index(name="IDX_1FF8C8439FF32DC0", columns={"arancel"}), @ORM\Index(name="IDX_1FF8C843AEA271E1", columns={"bulto"}), @ORM\Index(name="IDX_1FF8C843A01B5DE", columns={"tarifa"})})
 * @ORM\Entity
 */
class Mercancia
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime", nullable=false)
     */
    private $fechacreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=0, nullable=false)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="volumenM3", type="float", precision=10, scale=0, nullable=false)
     */
    private $volumenm3;

    /**
     * @var float
     *
     * @ORM\Column(name="pesoKg", type="float", precision=10, scale=0, nullable=false)
     */
    private $pesokg;

    /**
     * @var float
     *
     * @ORM\Column(name="pesoLb", type="float", precision=10, scale=0, nullable=false)
     */
    private $pesolb;

    /**
     * @var float
     *
     * @ORM\Column(name="relacion", type="float", precision=10, scale=0, nullable=false)
     */
    private $relacion;

    /**
     * @var float
     *
     * @ORM\Column(name="alturaCm", type="float", precision=10, scale=0, nullable=false)
     */
    private $alturacm;

    /**
     * @var float
     *
     * @ORM\Column(name="anchoCm", type="float", precision=10, scale=0, nullable=false)
     */
    private $anchocm;

    /**
     * @var float
     *
     * @ORM\Column(name="profundidadCm", type="float", precision=10, scale=0, nullable=false)
     */
    private $profundidadcm;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tarifaAlternativa", type="float", precision=10, scale=0, nullable=true)
     */
    private $tarifaalternativa;

    /**
     * @var \Mercancia
     *
     * @ORM\ManyToOne(targetEntity="Mercancia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="miRelacionada", referencedColumnName="id")
     * })
     */
    private $mirelacionada;

    /**
     * @var \Arancel
     *
     * @ORM\ManyToOne(targetEntity="Arancel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arancel", referencedColumnName="id")
     * })
     */
    private $arancel;

    /**
     * @var \Tarifa
     *
     * @ORM\ManyToOne(targetEntity="Tarifa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarifa", referencedColumnName="id")
     * })
     */
    private $tarifa;

    /**
     * @var \Bulto
     *
     * @ORM\ManyToOne(targetEntity="Bulto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bulto", referencedColumnName="id")
     * })
     */
    private $bulto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechacreacion(): ?\DateTimeInterface
    {
        return $this->fechacreacion;
    }

    public function setFechacreacion(\DateTimeInterface $fechacreacion): self
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getVolumenm3(): ?float
    {
        return $this->volumenm3;
    }

    public function setVolumenm3(float $volumenm3): self
    {
        $this->volumenm3 = $volumenm3;

        return $this;
    }

    public function getPesokg(): ?float
    {
        return $this->pesokg;
    }

    public function setPesokg(float $pesokg): self
    {
        $this->pesokg = $pesokg;

        return $this;
    }

    public function getPesolb(): ?float
    {
        return $this->pesolb;
    }

    public function setPesolb(float $pesolb): self
    {
        $this->pesolb = $pesolb;

        return $this;
    }

    public function getRelacion(): ?float
    {
        return $this->relacion;
    }

    public function setRelacion(float $relacion): self
    {
        $this->relacion = $relacion;

        return $this;
    }

    public function getAlturacm(): ?float
    {
        return $this->alturacm;
    }

    public function setAlturacm(float $alturacm): self
    {
        $this->alturacm = $alturacm;

        return $this;
    }

    public function getAnchocm(): ?float
    {
        return $this->anchocm;
    }

    public function setAnchocm(float $anchocm): self
    {
        $this->anchocm = $anchocm;

        return $this;
    }

    public function getProfundidadcm(): ?float
    {
        return $this->profundidadcm;
    }

    public function setProfundidadcm(float $profundidadcm): self
    {
        $this->profundidadcm = $profundidadcm;

        return $this;
    }

    public function getTarifaalternativa(): ?float
    {
        return $this->tarifaalternativa;
    }

    public function setTarifaalternativa(?float $tarifaalternativa): self
    {
        $this->tarifaalternativa = $tarifaalternativa;

        return $this;
    }

    public function getMirelacionada(): ?self
    {
        return $this->mirelacionada;
    }

    public function setMirelacionada(?self $mirelacionada): self
    {
        $this->mirelacionada = $mirelacionada;

        return $this;
    }

    public function getArancel(): ?Arancel
    {
        return $this->arancel;
    }

    public function setArancel(?Arancel $arancel): self
    {
        $this->arancel = $arancel;

        return $this;
    }

    public function getTarifa(): ?Tarifa
    {
        return $this->tarifa;
    }

    public function setTarifa(?Tarifa $tarifa): self
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    public function getBulto(): ?Bulto
    {
        return $this->bulto;
    }

    public function setBulto(?Bulto $bulto): self
    {
        $this->bulto = $bulto;

        return $this;
    }


}
