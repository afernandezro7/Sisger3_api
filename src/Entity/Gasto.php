<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gasto
 *
 * @ORM\Table(name="gasto", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_6F82F510F7CD0BAD", columns={"idEgreso"})})
 * @ORM\Entity
 */
class Gasto
{
    /**
     * @var string
     *
     * @ORM\Column(name="detalles", type="text", length=16777215, nullable=false)
     */
    private $detalles;

    /**
     * @var string
     *
     * @ORM\Column(name="pagueA", type="string", length=255, nullable=false)
     */
    private $paguea;

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
     * @ORM\ManyToMany(targetEntity="Conceptogasto", inversedBy="gasto")
     * @ORM\JoinTable(name="gasto_conceptogasto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="gasto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="conceptogasto_id", referencedColumnName="id")
     *   }
     * )
     */
    private $conceptogasto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conceptogasto = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getPaguea(): ?string
    {
        return $this->paguea;
    }

    public function setPaguea(string $paguea): self
    {
        $this->paguea = $paguea;

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
     * @return Collection|Conceptogasto[]
     */
    public function getConceptogasto(): Collection
    {
        return $this->conceptogasto;
    }

    public function addConceptogasto(Conceptogasto $conceptogasto): self
    {
        if (!$this->conceptogasto->contains($conceptogasto)) {
            $this->conceptogasto[] = $conceptogasto;
        }

        return $this;
    }

    public function removeConceptogasto(Conceptogasto $conceptogasto): self
    {
        $this->conceptogasto->removeElement($conceptogasto);

        return $this;
    }

}
