<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reply
 *
 * @ORM\Table(name="reply", indexes={@ORM\Index(name="IDX_3C69E9E4F5E3EAD7", columns={"leader"}), @ORM\Index(name="IDX_3C69E9E48D93D649", columns={"user"}), @ORM\Index(name="IDX_3C69E9E48D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Reply
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
     * @var int
     *
     * @ORM\Column(name="pax", type="integer", nullable=false)
     */
    private $pax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private $observations;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var int
     *
     * @ORM\Column(name="month", type="integer", nullable=false)
     */
    private $month;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

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
     *   @ORM\JoinColumn(name="leader", referencedColumnName="id")
     * })
     */
    private $leader;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Agency", inversedBy="reply")
     * @ORM\JoinTable(name="reply_agency",
     *   joinColumns={
     *     @ORM\JoinColumn(name="reply_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="agency_id", referencedColumnName="id")
     *   }
     * )
     */
    private $agency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Client", inversedBy="reply")
     * @ORM\JoinTable(name="reply_client",
     *   joinColumns={
     *     @ORM\JoinColumn(name="reply_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     *   }
     * )
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="reply")
     * @ORM\JoinTable(name="reply_service",
     *   joinColumns={
     *     @ORM\JoinColumn(name="reply_id", referencedColumnName="id")
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
        $this->agency = new \Doctrine\Common\Collections\ArrayCollection();
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getPax(): ?int
    {
        return $this->pax;
    }

    public function setPax(int $pax): self
    {
        $this->pax = $pax;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

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

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

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

    public function getLeader(): ?Client
    {
        return $this->leader;
    }

    public function setLeader(?Client $leader): self
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * @return Collection|Agency[]
     */
    public function getAgency(): Collection
    {
        return $this->agency;
    }

    public function addAgency(Agency $agency): self
    {
        if (!$this->agency->contains($agency)) {
            $this->agency[] = $agency;
        }

        return $this;
    }

    public function removeAgency(Agency $agency): self
    {
        $this->agency->removeElement($agency);

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Client $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client[] = $client;
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        $this->client->removeElement($client);

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
