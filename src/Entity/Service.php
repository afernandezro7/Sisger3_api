<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service", indexes={@ORM\Index(name="IDX_2E20A34E8D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Service
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
     * @var \Workspace
     *
     * @ORM\ManyToOne(targetEntity="Workspace")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workspace", referencedColumnName="id")
     * })
     */
    private $workspace;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ingreso", mappedBy="service")
     */
    private $ingreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Reply", mappedBy="service")
     */
    private $reply;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Voucher", mappedBy="service")
     */
    private $voucher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingreso = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reply = new \Doctrine\Common\Collections\ArrayCollection();
        $this->voucher = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getWorkspace(): ?Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(?Workspace $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }

    /**
     * @return Collection|Ingreso[]
     */
    public function getIngreso(): Collection
    {
        return $this->ingreso;
    }

    public function addIngreso(Ingreso $ingreso): self
    {
        if (!$this->ingreso->contains($ingreso)) {
            $this->ingreso[] = $ingreso;
            $ingreso->addService($this);
        }

        return $this;
    }

    public function removeIngreso(Ingreso $ingreso): self
    {
        if ($this->ingreso->removeElement($ingreso)) {
            $ingreso->removeService($this);
        }

        return $this;
    }

    /**
     * @return Collection|Reply[]
     */
    public function getReply(): Collection
    {
        return $this->reply;
    }

    public function addReply(Reply $reply): self
    {
        if (!$this->reply->contains($reply)) {
            $this->reply[] = $reply;
            $reply->addService($this);
        }

        return $this;
    }

    public function removeReply(Reply $reply): self
    {
        if ($this->reply->removeElement($reply)) {
            $reply->removeService($this);
        }

        return $this;
    }

    /**
     * @return Collection|Voucher[]
     */
    public function getVoucher(): Collection
    {
        return $this->voucher;
    }

    public function addVoucher(Voucher $voucher): self
    {
        if (!$this->voucher->contains($voucher)) {
            $this->voucher[] = $voucher;
            $voucher->addService($this);
        }

        return $this;
    }

    public function removeVoucher(Voucher $voucher): self
    {
        if ($this->voucher->removeElement($voucher)) {
            $voucher->removeService($this);
        }

        return $this;
    }

}
