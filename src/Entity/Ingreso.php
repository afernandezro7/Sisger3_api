<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ingreso
 *
 * @ORM\Table(name="ingreso", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_3261D83DC224FED", columns={"idIngreso"})}, indexes={@ORM\Index(name="IDX_3261D83F41C9B25", columns={"cliente"})})
 * @ORM\Entity
 */
class Ingreso
{
    /**
     * @var string
     *
     * @ORM\Column(name="recibiDe", type="string", length=255, nullable=false)
     */
    private $recibide;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detalles", type="text", length=16777215, nullable=true)
     */
    private $detalles;

    /**
     * @var float|null
     *
     * @ORM\Column(name="saldoAnterior", type="float", precision=10, scale=0, nullable=true)
     */
    private $saldoanterior;

    /**
     * @var float|null
     *
     * @ORM\Column(name="abono", type="float", precision=10, scale=0, nullable=true)
     */
    private $abono;

    /**
     * @var float|null
     *
     * @ORM\Column(name="saldoPendiente", type="float", precision=10, scale=0, nullable=true)
     */
    private $saldopendiente;

    /**
     * @var bool
     *
     * @ORM\Column(name="cuentaXCobrar", type="boolean", nullable=false)
     */
    private $cuentaxcobrar;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaLimite", type="datetime", nullable=true)
     */
    private $fechalimite;

    /**
     * @var \Recibo
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Recibo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Idingreso
     *
     * @ORM\ManyToOne(targetEntity="Idingreso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idIngreso", referencedColumnName="id")
     * })
     */
    private $idingreso;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="ingreso")
     * @ORM\JoinTable(name="ingreso_service",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ingreso_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     *   }
     * )
     */
    private $service;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRecibide(): ?string
    {
        return $this->recibide;
    }

    public function setRecibide(string $recibide): self
    {
        $this->recibide = $recibide;

        return $this;
    }

    public function getDetalles(): ?string
    {
        return $this->detalles;
    }

    public function setDetalles(?string $detalles): self
    {
        $this->detalles = $detalles;

        return $this;
    }

    public function getSaldoanterior(): ?float
    {
        return $this->saldoanterior;
    }

    public function setSaldoanterior(?float $saldoanterior): self
    {
        $this->saldoanterior = $saldoanterior;

        return $this;
    }

    public function getAbono(): ?float
    {
        return $this->abono;
    }

    public function setAbono(?float $abono): self
    {
        $this->abono = $abono;

        return $this;
    }

    public function getSaldopendiente(): ?float
    {
        return $this->saldopendiente;
    }

    public function setSaldopendiente(?float $saldopendiente): self
    {
        $this->saldopendiente = $saldopendiente;

        return $this;
    }

    public function getCuentaxcobrar(): ?bool
    {
        return $this->cuentaxcobrar;
    }

    public function setCuentaxcobrar(bool $cuentaxcobrar): self
    {
        $this->cuentaxcobrar = $cuentaxcobrar;

        return $this;
    }

    public function getFechalimite(): ?\DateTimeInterface
    {
        return $this->fechalimite;
    }

    public function setFechalimite(?\DateTimeInterface $fechalimite): self
    {
        $this->fechalimite = $fechalimite;

        return $this;
    }

    public function getId(): ?Recibo
    {
        return $this->id;
    }

    public function setId(?Recibo $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdingreso(): ?Idingreso
    {
        return $this->idingreso;
    }

    public function setIdingreso(?Idingreso $idingreso): self
    {
        $this->idingreso = $idingreso;

        return $this;
    }

    public function getCliente(): ?Client
    {
        return $this->cliente;
    }

    public function setCliente(?Client $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->service->removeElement($service);

        return $this;
    }

}
