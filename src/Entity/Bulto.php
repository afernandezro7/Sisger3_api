<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bulto
 *
 * @ORM\Table(name="bulto", indexes={@ORM\Index(name="IDX_6F635EE5648388D0", columns={"concepto"})})
 * @ORM\Entity
 */
class Bulto
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
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var int
     *
     * @ORM\Column(name="indice", type="integer", nullable=false)
     */
    private $indice;

    /**
     * @var \Concepto
     *
     * @ORM\ManyToOne(targetEntity="Concepto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concepto", referencedColumnName="id")
     * })
     */
    private $concepto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSisgercode(): ?string
    {
        return $this->sisgercode;
    }

    public function setSisgercode(?string $sisgercode): self
    {
        $this->sisgercode = $sisgercode;

        return $this;
    }

    public function getIndice(): ?int
    {
        return $this->indice;
    }

    public function setIndice(int $indice): self
    {
        $this->indice = $indice;

        return $this;
    }

    public function getConcepto(): ?Concepto
    {
        return $this->concepto;
    }

    public function setConcepto(?Concepto $concepto): self
    {
        $this->concepto = $concepto;

        return $this;
    }


}
