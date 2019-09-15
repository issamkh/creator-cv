<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriePortfolioRepository")
 */
class CategoriePortfolio
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Portfolio", mappedBy="categoriePortfolio")
     */
    private $portfolio;

    public function __construct()
    {
        $this->portfolio = new ArrayCollection();
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
     * @return Collection|Portfolio[]
     */
    public function getPortfolio(): Collection
    {
        return $this->portfolio;
    }

    public function addPortfolio(Portfolio $portfolio): self
    {
        if (!$this->portfolio->contains($portfolio)) {
            $this->portfolio[] = $portfolio;
            $portfolio->setCategoriePortfolio($this);
        }

        return $this;
    }

    public function removePortfolio(Portfolio $portfolio): self
    {
        if ($this->portfolio->contains($portfolio)) {
            $this->portfolio->removeElement($portfolio);
            // set the owning side to null (unless already changed)
            if ($portfolio->getCategoriePortfolio() === $this) {
                $portfolio->setCategoriePortfolio(null);
            }
        }

        return $this;
    }
}
