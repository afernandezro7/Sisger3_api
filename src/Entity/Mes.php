<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mes
 *
 * @ORM\Table(name="mes", indexes={@ORM\Index(name="IDX_568578E5C6E493B0", columns={"anno"})})
 * @ORM\Entity
 */
class Mes
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
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \Anno
     *
     * @ORM\ManyToOne(targetEntity="Anno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="anno", referencedColumnName="id")
     * })
     */
    private $anno;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAnno(): ?Anno
    {
        return $this->anno;
    }

    public function setAnno(?Anno $anno): self
    {
        $this->anno = $anno;

        return $this;
    }


}
