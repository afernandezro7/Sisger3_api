<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conceptocosto
 *
 * @ORM\Table(name="conceptocosto", indexes={@ORM\Index(name="IDX_8A5985E18D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Conceptocosto
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
     * @ORM\ManyToMany(targetEntity="Costo", mappedBy="conceptocosto")
     */
    private $costo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->costo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Collection|Costo[]
     */
    public function getCosto(): Collection
    {
        return $this->costo;
    }

    public function addCosto(Costo $costo): self
    {
        if (!$this->costo->contains($costo)) {
            $this->costo[] = $costo;
            $costo->addConceptocosto($this);
        }

        return $this;
    }

    public function removeCosto(Costo $costo): self
    {
        if ($this->costo->removeElement($costo)) {
            $costo->removeConceptocosto($this);
        }

        return $this;
    }

}
