<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concepto
 *
 * @ORM\Table(name="concepto", indexes={@ORM\Index(name="IDX_9DF5EA868F8E7CD", columns={"consignado"}), @ORM\Index(name="expediente", columns={"expediente"}), @ORM\Index(name="IDX_9DF5EA8651A5ACA4", columns={"remitente"}), @ORM\Index(name="IDX_9DF5EA86E6B58BB1", columns={"contenedor"})})
 * @ORM\Entity(repositoryClass="App\Repository\ConceptoRepository")
 */
class Concepto
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
    private $fechaCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgerCode;

    /**
     * @var string
     *
     * @ORM\Column(name="discr", type="string", length=255, nullable=false)
     */
    private $discr;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255, nullable=false)
     */
    private $estado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaHBL", type="datetime", nullable=true)
     */
    private $fechaHBL;

    /**
     * @var \Reply
     *
     * @ORM\ManyToOne(targetEntity="Reply")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expediente", referencedColumnName="id")
     * })
     */
    private $expediente;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="remitente", referencedColumnName="id")
     * })
     */
    private $remitente;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consignado", referencedColumnName="id")
     * })
     */
    private $consignado;

    /**
     * @var \Contenedor
     *
     * @ORM\ManyToOne(targetEntity="Contenedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contenedor", referencedColumnName="id")
     * })
     */
    private $contenedor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getSisgerCode(): ?string
    {
        return $this->sisgerCode;
    }

    public function setSisgerCode(?string $sisgerCode): self
    {
        $this->sisgerCode = $sisgerCode;

        return $this;
    }

    public function getDiscr(): ?string
    {
        return $this->discr;
    }

    public function setDiscr(string $discr): self
    {
        $this->discr = $discr;

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

    public function getFechaHBL(): ?\DateTimeInterface
    {
        return $this->fechaHBL;
    }

    public function setFechaHBL(?\DateTimeInterface $fechaHBL): self
    {
        $this->fechaHBL = $fechaHBL;

        return $this;
    }

    public function getExpediente(): ?Reply
    {
        return $this->expediente;
    }

    public function setExpediente(?Reply $expediente): self
    {
        $this->expediente = $expediente;

        return $this;
    }

    public function getRemitente(): ?Client
    {
        return $this->remitente;
    }

    public function setRemitente(?Client $remitente): self
    {
        $this->remitente = $remitente;

        return $this;
    }

    public function getConsignado(): ?Client
    {
        return $this->consignado;
    }

    public function setConsignado(?Client $consignado): self
    {
        $this->consignado = $consignado;

        return $this;
    }

    public function getContenedor(): ?Contenedor
    {
        return $this->contenedor;
    }

    public function setContenedor(?Contenedor $contenedor): self
    {
        $this->contenedor = $contenedor;

        return $this;
    }


}
