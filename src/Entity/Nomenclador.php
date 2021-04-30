<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nomenclador
 *
 * @ORM\Table(name="nomenclador", indexes={@ORM\Index(name="IDX_637350368D940019", columns={"workspace"})})
 * @ORM\Entity
 */
class Nomenclador
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
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

    public function getId(): ?string
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


}
