<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Extra
 *
 * @ORM\Table(name="extra", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8CFE2261C949A274", columns={"entrada"})}, indexes={@ORM\Index(name="IDX_8CFE22612265B05D", columns={"usuario"}), @ORM\Index(name="IDX_8CFE2261E766A51E", columns={"banking"})})
 * @ORM\Entity
 */
class Extra
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255, nullable=false)
     */
    private $concepto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sisgerCode", type="string", length=255, nullable=true)
     */
    private $sisgercode;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Bankingentry
     *
     * @ORM\ManyToOne(targetEntity="Bankingentry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entrada", referencedColumnName="id")
     * })
     */
    private $entrada;

    /**
     * @var \Banking
     *
     * @ORM\ManyToOne(targetEntity="Banking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="banking", referencedColumnName="id")
     * })
     */
    private $banking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getConcepto(): ?string
    {
        return $this->concepto;
    }

    public function setConcepto(string $concepto): self
    {
        $this->concepto = $concepto;

        return $this;
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

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getEntrada(): ?Bankingentry
    {
        return $this->entrada;
    }

    public function setEntrada(?Bankingentry $entrada): self
    {
        $this->entrada = $entrada;

        return $this;
    }

    public function getBanking(): ?Banking
    {
        return $this->banking;
    }

    public function setBanking(?Banking $banking): self
    {
        $this->banking = $banking;

        return $this;
    }


}
