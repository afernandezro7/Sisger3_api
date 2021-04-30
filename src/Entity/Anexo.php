<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anexo
 *
 * @ORM\Table(name="anexo")
 * @ORM\Entity
 */
class Anexo
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
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cost", type="float", precision=10, scale=0, nullable=true)
     */
    private $cost;

    /**
     * @var float|null
     *
     * @ORM\Column(name="abonos", type="float", precision=10, scale=0, nullable=true)
     */
    private $abonos;

    /**
     * @var float|null
     *
     * @ORM\Column(name="uNeta", type="float", precision=10, scale=0, nullable=true)
     */
    private $uneta;

    /**
     * @var float|null
     *
     * @ORM\Column(name="uBruta", type="float", precision=10, scale=0, nullable=true)
     */
    private $ubruta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(?float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getAbonos(): ?float
    {
        return $this->abonos;
    }

    public function setAbonos(?float $abonos): self
    {
        $this->abonos = $abonos;

        return $this;
    }

    public function getUneta(): ?float
    {
        return $this->uneta;
    }

    public function setUneta(?float $uneta): self
    {
        $this->uneta = $uneta;

        return $this;
    }

    public function getUbruta(): ?float
    {
        return $this->ubruta;
    }

    public function setUbruta(?float $ubruta): self
    {
        $this->ubruta = $ubruta;

        return $this;
    }


}
