<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precioventa
 *
 * @ORM\Table(name="precioventa", indexes={@ORM\Index(name="IDX_C69DD82B195F051C", columns={"expedienteLider"}), @ORM\Index(name="IDX_C69DD82BD59CA413", columns={"expediente"}), @ORM\Index(name="IDX_C69DD82BF41C9B25", columns={"cliente"})})
 * @ORM\Entity
 */
class Precioventa
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
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=true)
     */
    private $precio;

    /**
     * @var \Reply
     *
     * @ORM\ManyToOne(targetEntity="Reply")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expedienteLider", referencedColumnName="id")
     * })
     */
    private $expedientelider;

    /**
     * @var \Reply
     *
     * @ORM\ManyToOne(targetEntity="Reply")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expediente", referencedColumnName="id")
     * })
     */
    private $expediente;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     * })
     */
    private $cliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(?float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getExpedientelider(): ?Reply
    {
        return $this->expedientelider;
    }

    public function setExpedientelider(?Reply $expedientelider): self
    {
        $this->expedientelider = $expedientelider;

        return $this;
    }

    public function getExpediente(): ?Reply
    {
        return $this->expediente;
    }

    public function setExpediente(?Reply $expediente): self
    {
        $this->expediente = $expediente;

        return $this;
    }

    public function getCliente(): ?Client
    {
        return $this->cliente;
    }

    public function setCliente(?Client $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }


}
