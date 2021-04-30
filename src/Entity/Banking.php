<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Banking
 *
 * @ORM\Table(name="banking")
 * @ORM\Entity
 */
class Banking
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float", precision=10, scale=0, nullable=false)
     */
    private $balance;

    /**
     * @var float
     *
     * @ORM\Column(name="initBalance", type="float", precision=10, scale=0, nullable=false)
     */
    private $initbalance;

    /**
     * @var string
     *
     * @ORM\Column(name="discr", type="string", length=255, nullable=false)
     */
    private $discr;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Paymentmethod", inversedBy="banking")
     * @ORM\JoinTable(name="metodopago_banking",
     *   joinColumns={
     *     @ORM\JoinColumn(name="banking_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="paymentmethod_id", referencedColumnName="id")
     *   }
     * )
     */
    private $paymentmethod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Workspace", inversedBy="banking")
     * @ORM\JoinTable(name="workspace_banking",
     *   joinColumns={
     *     @ORM\JoinColumn(name="banking_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="workspace_id", referencedColumnName="id")
     *   }
     * )
     */
    private $workspace;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paymentmethod = new \Doctrine\Common\Collections\ArrayCollection();
        $this->workspace = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getInitbalance(): ?float
    {
        return $this->initbalance;
    }

    public function setInitbalance(float $initbalance): self
    {
        $this->initbalance = $initbalance;

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

    /**
     * @return Collection|Paymentmethod[]
     */
    public function getPaymentmethod(): Collection
    {
        return $this->paymentmethod;
    }

    public function addPaymentmethod(Paymentmethod $paymentmethod): self
    {
        if (!$this->paymentmethod->contains($paymentmethod)) {
            $this->paymentmethod[] = $paymentmethod;
        }

        return $this;
    }

    public function removePaymentmethod(Paymentmethod $paymentmethod): self
    {
        $this->paymentmethod->removeElement($paymentmethod);

        return $this;
    }

    /**
     * @return Collection|Workspace[]
     */
    public function getWorkspace(): Collection
    {
        return $this->workspace;
    }

    public function addWorkspace(Workspace $workspace): self
    {
        if (!$this->workspace->contains($workspace)) {
            $this->workspace[] = $workspace;
        }

        return $this;
    }

    public function removeWorkspace(Workspace $workspace): self
    {
        $this->workspace->removeElement($workspace);

        return $this;
    }

}
