<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Envio
 *
 * @ORM\Table(name="envio")
 * @ORM\Entity
 */
class Envio
{
    /**
     * @var string
     *
     * @ORM\Column(name="remitenteNombre", type="string", length=255, nullable=false)
     */
    private $remitentenombre;

    /**
     * @var string
     *
     * @ORM\Column(name="remitenteCedula", type="string", length=255, nullable=false)
     */
    private $remitentecedula;

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

    public function getRemitentenombre(): ?string
    {
        return $this->remitentenombre;
    }

    public function setRemitentenombre(string $remitentenombre): self
    {
        $this->remitentenombre = $remitentenombre;

        return $this;
    }

    public function getRemitentecedula(): ?string
    {
        return $this->remitentecedula;
    }

    public function setRemitentecedula(string $remitentecedula): self
    {
        $this->remitentecedula = $remitentecedula;

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
