<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 */
class Currency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CurrencyRate", mappedBy="currency")
     */
    private $currencyRate;

    public function __construct()
    {
        $this->currencyRate = new ArrayCollection();
    }

    /**
     * @return Collection |Currency[]
     */
    public function getCurrencyRate(): Collection
    {
        return $this->currencyRate;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
