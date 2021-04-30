<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conceptogasto
 *
 * @ORM\Table(name="conceptogasto", indexes={@ORM\Index(name="IDX_9F0654128D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Conceptogasto
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
     * @ORM\ManyToMany(targetEntity="Gasto", mappedBy="conceptogasto")
     */
    private $gasto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gasto = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Collection|Gasto[]
     */
    public function getGasto(): Collection
    {
        return $this->gasto;
    }

    public function addGasto(Gasto $gasto): self
    {
        if (!$this->gasto->contains($gasto)) {
            $this->gasto[] = $gasto;
            $gasto->addConceptogasto($this);
        }

        return $this;
    }

    public function removeGasto(Gasto $gasto): self
    {
        if ($this->gasto->removeElement($gasto)) {
            $gasto->removeConceptogasto($this);
        }

        return $this;
    }

}
