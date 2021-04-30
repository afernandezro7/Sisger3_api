<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Receipe
 *
 * @ORM\Table(name="receipe", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_F694AF2B2B219D70", columns={"entry"})}, indexes={@ORM\Index(name="IDX_F694AF2B8D940019", columns={"workspace"}), @ORM\Index(name="IDX_F694AF2BFDA8C6E0", columns={"reply"}), @ORM\Index(name="IDX_F694AF2B8484E578", columns={"paymentMethod"})})
 * @ORM\Entity
 */
class Receipe
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
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     */
    private $creationdate;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="recibide", type="string", length=255, nullable=false)
     */
    private $recibide;

    /**
     * @var string
     *
     * @ORM\Column(name="suma", type="string", length=255, nullable=false)
     */
    private $suma;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255, nullable=false)
     */
    private $concepto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refExpediente", type="string", length=255, nullable=true)
     */
    private $refexpediente;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var \Bankingentry
     *
     * @ORM\ManyToOne(targetEntity="Bankingentry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entry", referencedColumnName="id")
     * })
     */
    private $entry;

    /**
     * @var \Paymentmethod
     *
     * @ORM\ManyToOne(targetEntity="Paymentmethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paymentMethod", referencedColumnName="id")
     * })
     */
    private $paymentmethod;

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
     *   @ORM\JoinColumn(name="reply", referencedColumnName="id")
     * })
     */
    private $reply;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Receipe", mappedBy="costo")
     */
    private $ingreso;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingreso = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
        $this->creationdate = $creationdate;

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

    public function getRecibide(): ?string
    {
        return $this->recibide;
    }

    public function setRecibide(string $recibide): self
    {
        $this->recibide = $recibide;

        return $this;
    }

    public function getSuma(): ?string
    {
        return $this->suma;
    }

    public function setSuma(string $suma): self
    {
        $this->suma = $suma;

        return $this;
    }

    public function getConcepto(): ?string
    {
        return $this->concepto;
    }

    public function setConcepto(string $concepto): self
    {
        $this->concepto = $concepto;

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

    public function getRefexpediente(): ?string
    {
        return $this->refexpediente;
    }

    public function setRefexpediente(?string $refexpediente): self
    {
        $this->refexpediente = $refexpediente;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEntry(): ?Bankingentry
    {
        return $this->entry;
    }

    public function setEntry(?Bankingentry $entry): self
    {
        $this->entry = $entry;

        return $this;
    }

    public function getPaymentmethod(): ?Paymentmethod
    {
        return $this->paymentmethod;
    }

    public function setPaymentmethod(?Paymentmethod $paymentmethod): self
    {
        $this->paymentmethod = $paymentmethod;

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

    public function getReply(): ?Reply
    {
        return $this->reply;
    }

    public function setReply(?Reply $reply): self
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * @return Collection|Receipe[]
     */
    public function getIngreso(): Collection
    {
        return $this->ingreso;
    }

    public function addIngreso(Receipe $ingreso): self
    {
        if (!$this->ingreso->contains($ingreso)) {
            $this->ingreso[] = $ingreso;
            $ingreso->addCosto($this);
        }

        return $this;
    }

    public function removeIngreso(Receipe $ingreso): self
    {
        if ($this->ingreso->removeElement($ingreso)) {
            $ingreso->removeCosto($this);
        }

        return $this;
    }

}
