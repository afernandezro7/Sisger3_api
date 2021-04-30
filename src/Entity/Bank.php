<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bank
 *
 * @ORM\Table(name="bank")
 * @ORM\Entity
 */
class Bank
{
    /**
     * @var \Banking
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Banking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getId(): ?Banking
    {
        return $this->id;
    }

    public function setId(?Banking $id): self
    {
        $this->id = $id;

        return $this;
    }


}
