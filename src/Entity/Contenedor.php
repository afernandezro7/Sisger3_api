<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenedor
 *
 * @ORM\Table(name="contenedor", indexes={@ORM\Index(name="IDX_A9E888616EC83E05", columns={"mes"}), @ORM\Index(name="IDX_A9E88861702D1D47", columns={"tipo"})})
 * @ORM\Entity
 */
class Contenedor
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
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="text", length=0, nullable=true)
     */
    private $codigo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sello", type="text", length=0, nullable=true)
     */
    private $sello;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="text", length=0, nullable=false)
     */
    private $estado;

    /**
     * @var float
     *
     * @ORM\Column(name="volumenM3", type="float", precision=10, scale=0, nullable=false)
     */
    private $volumenm3;

    /**
     * @var float
     *
     * @ORM\Column(name="maxPesoKg", type="float", precision=10, scale=0, nullable=false)
     */
    private $maxpesokg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motonave", type="text", length=0, nullable=true)
     */
    private $motonave;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mbl", type="text", length=0, nullable=true)
     */
    private $mbl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="puertoSalida", type="text", length=0, nullable=true)
     */
    private $puertosalida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="puertoEntrada", type="text", length=0, nullable=true)
     */
    private $puertoentrada;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaEntrada", type="datetime", nullable=true)
     */
    private $fechaentrada;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaSalida", type="datetime", nullable=true)
     */
    private $fechasalida;

    /**
     * @var int
     *
     * @ORM\Column(name="indice", type="integer", nullable=false)
     */
    private $indice;

    /**
     * @var int
     *
     * @ORM\Column(name="indiceAnual", type="integer", nullable=false)
     */
    private $indiceanual;

    /**
     * @var \Mes
     *
     * @ORM\ManyToOne(targetEntity="Mes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mes", referencedColumnName="id")
     * })
     */
    private $mes;

    /**
     * @var \Tipocontenedor
     *
     * @ORM\ManyToOne(targetEntity="Tipocontenedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo", referencedColumnName="id")
     * })
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getSello(): ?string
    {
        return $this->sello;
    }

    public function setSello(?string $sello): self
    {
        $this->sello = $sello;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

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

    public function getMaxpesokg(): ?float
    {
        return $this->maxpesokg;
    }

    public function setMaxpesokg(float $maxpesokg): self
    {
        $this->maxpesokg = $maxpesokg;

        return $this;
    }

    public function getMotonave(): ?string
    {
        return $this->motonave;
    }

    public function setMotonave(?string $motonave): self
    {
        $this->motonave = $motonave;

        return $this;
    }

    public function getMbl(): ?string
    {
        return $this->mbl;
    }

    public function setMbl(?string $mbl): self
    {
        $this->mbl = $mbl;

        return $this;
    }

    public function getPuertosalida(): ?string
    {
        return $this->puertosalida;
    }

    public function setPuertosalida(?string $puertosalida): self
    {
        $this->puertosalida = $puertosalida;

        return $this;
    }

    public function getPuertoentrada(): ?string
    {
        return $this->puertoentrada;
    }

    public function setPuertoentrada(?string $puertoentrada): self
    {
        $this->puertoentrada = $puertoentrada;

        return $this;
    }

    public function getFechaentrada(): ?\DateTimeInterface
    {
        return $this->fechaentrada;
    }

    public function setFechaentrada(?\DateTimeInterface $fechaentrada): self
    {
        $this->fechaentrada = $fechaentrada;

        return $this;
    }

    public function getFechasalida(): ?\DateTimeInterface
    {
        return $this->fechasalida;
    }

    public function setFechasalida(?\DateTimeInterface $fechasalida): self
    {
        $this->fechasalida = $fechasalida;

        return $this;
    }

    public function getIndice(): ?int
    {
        return $this->indice;
    }

    public function setIndice(int $indice): self
    {
        $this->indice = $indice;

        return $this;
    }

    public function getIndiceanual(): ?int
    {
        return $this->indiceanual;
    }

    public function setIndiceanual(int $indiceanual): self
    {
        $this->indiceanual = $indiceanual;

        return $this;
    }

    public function getMes(): ?Mes
    {
        return $this->mes;
    }

    public function setMes(?Mes $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function getTipo(): ?Tipocontenedor
    {
        return $this->tipo;
    }

    public function setTipo(?Tipocontenedor $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }


}
