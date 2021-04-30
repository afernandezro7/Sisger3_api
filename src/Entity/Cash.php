<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cash
 *
 * @ORM\Table(name="cash")
 * @ORM\Entity
 */
class Cash
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
