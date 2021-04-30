<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paymentmethod
 *
 * @ORM\Table(name="paymentmethod")
 * @ORM\Entity
 */
class Paymentmethod
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
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Banking", mappedBy="paymentmethod")
     */
    private $banking;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->banking = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|Banking[]
     */
    public function getBanking(): Collection
    {
        return $this->banking;
    }

    public function addBanking(Banking $banking): self
    {
        if (!$this->banking->contains($banking)) {
            $this->banking[] = $banking;
            $banking->addPaymentmethod($this);
        }

        return $this;
    }

    public function removeBanking(Banking $banking): self
    {
        if ($this->banking->removeElement($banking)) {
            $banking->removePaymentmethod($this);
        }

        return $this;
    }

}
