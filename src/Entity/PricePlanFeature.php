<?php

namespace App\Entity;

use App\Repository\PricePlanFeatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricePlanFeatureRepository::class)]
class PricePlanFeature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: PricePlan::class, mappedBy: 'features')]
    private Collection $pricePlans;

    public function __construct()
    {
        $this->pricePlans = new ArrayCollection();
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

    /**
     * @return Collection<int, PricePlan>
     */
    public function getPricePlans(): Collection
    {
        return $this->pricePlans;
    }

    public function addPricePlan(PricePlan $pricePlan): self
    {
        if (!$this->pricePlans->contains($pricePlan)) {
            $this->pricePlans->add($pricePlan);
            $pricePlan->addFeature($this);
        }

        return $this;
    }

    public function removePricePlan(PricePlan $pricePlan): self
    {
        if ($this->pricePlans->removeElement($pricePlan)) {
            $pricePlan->removeFeature($this);
        }

        return $this;
    }
}
