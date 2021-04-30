<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menaje
 *
 * @ORM\Table(name="menaje")
 * @ORM\Entity
 */
class Menaje
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAutorizacion", type="datetime", nullable=false)
     */
    private $fechaautorizacion;

    /**
     * @var \Concepto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Concepto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getFechaautorizacion(): ?\DateTimeInterface
    {
        return $this->fechaautorizacion;
    }

    public function setFechaautorizacion(\DateTimeInterface $fechaautorizacion): self
    {
        $this->fechaautorizacion = $fechaautorizacion;

        return $this;
    }

    public function getId(): ?Concepto
    {
        return $this->id;
    }

    public function setId(?Concepto $id): self
    {
        $this->id = $id;

        return $this;
    }


}
