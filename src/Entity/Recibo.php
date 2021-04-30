<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recibo
 *
 * @ORM\Table(name="recibo", indexes={@ORM\Index(name="IDX_45052DCC2265B05D", columns={"usuario"}), @ORM\Index(name="IDX_45052DCCD59CA413", columns={"expediente"}), @ORM\Index(name="IDX_45052DCC792D02F7", columns={"metodoPago"}), @ORM\Index(name="IDX_45052DCC8D940019", columns={"workspace"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReciboRepository")
 * 
 */
class Recibo
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
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suma", type="string", length=255, nullable=true)
     */
    private $suma;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refExpediente", type="string", length=255, nullable=true)
     */
    private $refexpediente;

    /**
     * @var string
     *
     * @ORM\Column(name="discr", type="string", length=255, nullable=false)
     */
    private $discr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivoCancelacion", type="text", length=0, nullable=true)
     */
    private $motivocancelacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creacion", type="datetime", nullable=false)
     */
    private $creacion;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="firmado", type="boolean", nullable=true)
     */
    private $firmado;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Paymentmethod
     *
     * @ORM\ManyToOne(targetEntity="Paymentmethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metodoPago", referencedColumnName="id")
     * })
     */
    private $metodopago;

    /**
     * @var \Workspace
     *
     * @ORM\ManyToOne(targetEntity="Workspace")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workspace", referencedColumnName="id")
     * })
     */
    private $workspace;

    /**
     * @var \Reply
     *
     * @ORM\ManyToOne(targetEntity="Reply")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expediente", referencedColumnName="id")
     * })
     */
    private $expediente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getSuma(): ?string
    {
        return $this->suma;
    }

    public function setSuma(?string $suma): self
    {
        $this->suma = $suma;

        return $this;
    }

    public function getSisgercode(): ?string
    {
        return $this->sisgercode;
    }

    public function setSisgercode(?string $sisgercode): self
    {
        $this->sisgercode = $sisgercode;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getRefexpediente(): ?string
    {
        return $this->refexpediente;
    }

    public function setRefexpediente(?string $refexpediente): self
    {
        $this->refexpediente = $refexpediente;

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

    public function getMotivocancelacion(): ?string
    {
        return $this->motivocancelacion;
    }

    public function setMotivocancelacion(?string $motivocancelacion): self
    {
        $this->motivocancelacion = $motivocancelacion;

        return $this;
    }

    public function getCreacion(): ?\DateTimeInterface
    {
        return $this->creacion;
    }

    public function setCreacion(\DateTimeInterface $creacion): self
    {
        $this->creacion = $creacion;

        return $this;
    }

    public function getFirmado(): ?bool
    {
        return $this->firmado;
    }

    public function setFirmado(?bool $firmado): self
    {
        $this->firmado = $firmado;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getMetodopago(): ?Paymentmethod
    {
        return $this->metodopago;
    }

    public function setMetodopago(?Paymentmethod $metodopago): self
    {
        $this->metodopago = $metodopago;

        return $this;
    }

    public function getWorkspace(): ?Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(?Workspace $workspace): self
    {
        $this->workspace = $workspace;

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


}
