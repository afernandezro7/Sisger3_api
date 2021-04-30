<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipocontenedor
 *
 * @ORM\Table(name="tipocontenedor")
 * @ORM\Entity
 */
class Tipocontenedor
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
     * @ORM\Column(name="nombre", type="text", length=0, nullable=false)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="volumenM3", type="float", precision=10, scale=0, nullable=false)
     */
    private $volumenm3;

    /**
     * @var float
     *
     * @ORM\Column(name="pesoKg", type="float", precision=10, scale=0, nullable=false)
     */
    private $pesokg;

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

    public function getVolumenm3(): ?float
    {
        return $this->volumenm3;
    }

    public function setVolumenm3(float $volumenm3): self
    {
        $this->volumenm3 = $volumenm3;

        return $this;
    }

    public function getPesokg(): ?float
    {
        return $this->pesokg;
    }

    public function setPesokg(float $pesokg): self
    {
        $this->pesokg = $pesokg;

        return $this;
    }


}
