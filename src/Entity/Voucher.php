<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 *
 * @ORM\Table(name="voucher", indexes={@ORM\Index(name="IDX_DC2F9C44FDA8C6E0", columns={"reply"}), @ORM\Index(name="IDX_DC2F9C448D940019", columns={"workspace"}), @ORM\Index(name="IDX_DC2F9C44C7440455", columns={"client"}), @ORM\Index(name="IDX_DC2F9C448D93D649", columns={"user"})})
 * @ORM\Entity
 */
class Voucher
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
     * @ORM\Column(name="beginDate", type="datetime", nullable=false)
     */
    private $begindate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishDate", type="datetime", nullable=false)
     */
    private $finishdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     */
    private $creationdate;

    /**
     * @var int
     *
     * @ORM\Column(name="pax", type="integer", nullable=false)
     */
    private $pax;

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=255, nullable=false)
     */
    private $provider;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refproviders", type="string", length=999, nullable=true)
     */
    private $refproviders;

    /**
     * @var string|null
     *
     * @ORM\Column(name="services", type="text", length=0, nullable=true)
     */
    private $services;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

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
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

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
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client", referencedColumnName="id")
     * })
     */
    private $client;

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
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="voucher")
     * @ORM\JoinTable(name="voucher_service",
     *   joinColumns={
     *     @ORM\JoinColumn(name="voucher_id", referencedColumnName="id")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegindate(): ?\DateTimeInterface
    {
        return $this->begindate;
    }

    public function setBegindate(\DateTimeInterface $begindate): self
    {
        $this->begindate = $begindate;

        return $this;
    }

    public function getFinishdate(): ?\DateTimeInterface
    {
        return $this->finishdate;
    }

    public function setFinishdate(\DateTimeInterface $finishdate): self
    {
        $this->finishdate = $finishdate;

        return $this;
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

    public function getPax(): ?int
    {
        return $this->pax;
    }

    public function setPax(int $pax): self
    {
        $this->pax = $pax;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

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

    public function getRefproviders(): ?string
    {
        return $this->refproviders;
    }

    public function setRefproviders(?string $refproviders): self
    {
        $this->refproviders = $refproviders;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(?string $services): self
    {
        $this->services = $services;

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

    public function getFirmado(): ?bool
    {
        return $this->firmado;
    }

    public function setFirmado(?bool $firmado): self
    {
        $this->firmado = $firmado;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
