<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 *
 * @ORM\Table(name="inventario", indexes={@ORM\Index(name="IDX_25444D258D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Inventario
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

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
     * @ORM\ManyToMany(targetEntity="Costorecurrente", mappedBy="inventario")
     */
    private $costorecurrente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->costorecurrente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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
     * @return Collection|Costorecurrente[]
     */
    public function getCostorecurrente(): Collection
    {
        return $this->costorecurrente;
    }

    public function addCostorecurrente(Costorecurrente $costorecurrente): self
    {
        if (!$this->costorecurrente->contains($costorecurrente)) {
            $this->costorecurrente[] = $costorecurrente;
            $costorecurrente->addInventario($this);
        }

        return $this;
    }

    public function removeCostorecurrente(Costorecurrente $costorecurrente): self
    {
        if ($this->costorecurrente->removeElement($costorecurrente)) {
            $costorecurrente->removeInventario($this);
        }

        return $this;
    }

}
