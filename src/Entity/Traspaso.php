<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traspaso
 *
 * @ORM\Table(name="traspaso", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_4956F2C088498C5B", columns={"entryDestino"}), @ORM\UniqueConstraint(name="UNIQ_4956F2C07BCA931E", columns={"entryOrigen"})}, indexes={@ORM\Index(name="IDX_4956F2C072441912", columns={"origen"}), @ORM\Index(name="IDX_4956F2C08D93D649", columns={"user"}), @ORM\Index(name="IDX_4956F2C081F64EFA", columns={"destino"})})
 * @ORM\Entity
 */
class Traspaso
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
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     */
    private $creationdate;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="suma", type="string", length=255, nullable=false)
     */
    private $suma;

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
     * @var \Banking
     *
     * @ORM\ManyToOne(targetEntity="Banking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="origen", referencedColumnName="id")
     * })
     */
    private $origen;

    /**
     * @var \Bankingentry
     *
     * @ORM\ManyToOne(targetEntity="Bankingentry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entryOrigen", referencedColumnName="id")
     * })
     */
    private $entryorigen;

    /**
     * @var \Banking
     *
     * @ORM\ManyToOne(targetEntity="Banking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="destino", referencedColumnName="id")
     * })
     */
    private $destino;

    /**
     * @var \Bankingentry
     *
     * @ORM\ManyToOne(targetEntity="Bankingentry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entryDestino", referencedColumnName="id")
     * })
     */
    private $entrydestino;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
        $this->creationdate = $creationdate;

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

    public function getSuma(): ?string
    {
        return $this->suma;
    }

    public function setSuma(string $suma): self
    {
        $this->suma = $suma;

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

    public function getOrigen(): ?Banking
    {
        return $this->origen;
    }

    public function setOrigen(?Banking $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getEntryorigen(): ?Bankingentry
    {
        return $this->entryorigen;
    }

    public function setEntryorigen(?Bankingentry $entryorigen): self
    {
        $this->entryorigen = $entryorigen;

        return $this;
    }

    public function getDestino(): ?Banking
    {
        return $this->destino;
    }

    public function setDestino(?Banking $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    public function getEntrydestino(): ?Bankingentry
    {
        return $this->entrydestino;
    }

    public function setEntrydestino(?Bankingentry $entrydestino): self
    {
        $this->entrydestino = $entrydestino;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
