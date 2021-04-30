<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ena
 *
 * @ORM\Table(name="ena")
 * @ORM\Entity
 */
class Ena
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEntrada", type="datetime", nullable=false)
     */
    private $fechaentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSalida", type="datetime", nullable=false)
     */
    private $fechasalida;

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

    public function getFechaentrada(): ?\DateTimeInterface
    {
        return $this->fechaentrada;
    }

    public function setFechaentrada(\DateTimeInterface $fechaentrada): self
    {
        $this->fechaentrada = $fechaentrada;

        return $this;
    }

    public function getFechasalida(): ?\DateTimeInterface
    {
        return $this->fechasalida;
    }

    public function setFechasalida(\DateTimeInterface $fechasalida): self
    {
        $this->fechasalida = $fechasalida;

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
