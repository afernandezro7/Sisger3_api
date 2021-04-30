<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Costo
 *
 * @ORM\Table(name="costo", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_7ADD24E3F7CD0BAD", columns={"idEgreso"})})
 * @ORM\Entity
 */
class Costo
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
     * @ORM\ManyToMany(targetEntity="Conceptocosto", inversedBy="costo")
     * @ORM\JoinTable(name="costo_conceptocosto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="costo_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="conceptocosto_id", referencedColumnName="id")
     *   }
     * )
     */
    private $conceptocosto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conceptocosto = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Collection|Conceptocosto[]
     */
    public function getConceptocosto(): Collection
    {
        return $this->conceptocosto;
    }

    public function addConceptocosto(Conceptocosto $conceptocosto): self
    {
        if (!$this->conceptocosto->contains($conceptocosto)) {
            $this->conceptocosto[] = $conceptocosto;
        }

        return $this;
    }

    public function removeConceptocosto(Conceptocosto $conceptocosto): self
    {
        $this->conceptocosto->removeElement($conceptocosto);

        return $this;
    }

}
