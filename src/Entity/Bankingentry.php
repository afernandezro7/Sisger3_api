<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bankingentry
 *
 * @ORM\Table(name="bankingentry", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_AD17BE142A928FA", columns={"recibo"})}, indexes={@ORM\Index(name="IDX_AD17BE1E766A51E", columns={"banking"})})
 * @ORM\Entity
 */
class Bankingentry
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
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", length=0, nullable=false)
     */
    private $details;

    /**
     * @var float
     *
     * @ORM\Column(name="credit", type="float", precision=10, scale=0, nullable=false)
     */
    private $credit;

    /**
     * @var float
     *
     * @ORM\Column(name="debit", type="float", precision=10, scale=0, nullable=false)
     */
    private $debit;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float", precision=10, scale=0, nullable=false)
     */
    private $balance;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var \Recibo
     *
     * @ORM\ManyToOne(targetEntity="Recibo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recibo", referencedColumnName="id")
     * })
     */
    private $recibo;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(float $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(float $debit): self
    {
        $this->debit = $debit;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getRecibo(): ?Recibo
    {
        return $this->recibo;
    }

    public function setRecibo(?Recibo $recibo): self
    {
        $this->recibo = $recibo;

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
