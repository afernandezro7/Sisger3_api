<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Costorecurrente
 *
 * @ORM\Table(name="costorecurrente", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_83A1FC12F7CD0BAD", columns={"idEgreso"})})
 * @ORM\Entity
 */
class Costorecurrente
{
    /**
     * @var string
     *
     * @ORM\Column(name="pagueA", type="string", length=255, nullable=false)
     */
    private $paguea;

    /**
     * @var string
     *
     * @ORM\Column(name="detalles", type="text", length=16777215, nullable=false)
     */
    private $detalles;

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
     * @var \Idegreso
     *
     * @ORM\ManyToOne(targetEntity="Idegreso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEgreso", referencedColumnName="id")
     * })
     */
    private $idegreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Inventario", inversedBy="costorecurrente")
     * @ORM\JoinTable(name="costorecurrente_inventario",
     *   joinColumns={
     *     @ORM\JoinColumn(name="costorecurrente_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="inventario_id", referencedColumnName="id")
     *   }
     * )
     */
    private $inventario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inventario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getPaguea(): ?string
    {
        return $this->paguea;
    }

    public function setPaguea(string $paguea): self
    {
        $this->paguea = $paguea;

        return $this;
    }

    public function getDetalles(): ?string
    {
        return $this->detalles;
    }

    public function setDetalles(string $detalles): self
    {
        $this->detalles = $detalles;

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

    public function getIdegreso(): ?Idegreso
    {
        return $this->idegreso;
    }

    public function setIdegreso(?Idegreso $idegreso): self
    {
        $this->idegreso = $idegreso;

        return $this;
    }

    /**
     * @return Collection|Inventario[]
     */
    public function getInventario(): Collection
    {
        return $this->inventario;
    }

    public function addInventario(Inventario $inventario): self
    {
        if (!$this->inventario->contains($inventario)) {
            $this->inventario[] = $inventario;
        }

        return $this;
    }

    public function removeInventario(Inventario $inventario): self
    {
        $this->inventario->removeElement($inventario);

        return $this;
    }

}
