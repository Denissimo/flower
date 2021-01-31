<?php

namespace App\Entity;

use App\Repository\FlowerCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerCategoryRepository::class)
 */
class FlowerCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameRus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameEng;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $leastQty;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leastSum;

    /**
     * @ORM\OneToMany(targetEntity=FlowerBouquet::class, mappedBy="category")
     */
    private $flowerBouquets;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descRus;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descEng;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $sortIndex;

    public function __construct()
    {
        $this->flowerBouquets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRus(): ?string
    {
        return $this->nameRus;
    }

    public function setNameRus(string $nameRus): self
    {
        $this->nameRus = $nameRus;

        return $this;
    }

    public function getNameEng(): ?string
    {
        return $this->nameEng;
    }

    public function setNameEng(string $nameEng): self
    {
        $this->nameEng = $nameEng;

        return $this;
    }

    public function getLeastQty(): ?int
    {
        return $this->leastQty;
    }

    public function setLeastQty(?int $leastQty): self
    {
        $this->leastQty = $leastQty;

        return $this;
    }

    public function getLeastSum(): ?int
    {
        return $this->leastSum;
    }

    public function setLeastSum(?int $leastSum): self
    {
        $this->leastSum = $leastSum;

        return $this;
    }

    /**
     * @return Collection|FlowerBouquet[]
     */
    public function getFlowerBouquets(): Collection
    {
        return $this->flowerBouquets;
    }

    public function addFlowerBouquet(FlowerBouquet $flowerBouquet): self
    {
        if (!$this->flowerBouquets->contains($flowerBouquet)) {
            $this->flowerBouquets[] = $flowerBouquet;
            $flowerBouquet->setCategory($this);
        }

        return $this;
    }

    public function removeFlowerBouquet(FlowerBouquet $flowerBouquet): self
    {
        if ($this->flowerBouquets->removeElement($flowerBouquet)) {
            // set the owning side to null (unless already changed)
            if ($flowerBouquet->getCategory() === $this) {
                $flowerBouquet->setCategory(null);
            }
        }

        return $this;
    }

    public function getDescRus(): ?string
    {
        return $this->descRus;
    }

    public function setDescRus(?string $descRus): self
    {
        $this->descRus = $descRus;

        return $this;
    }

    public function getDescEng(): ?string
    {
        return $this->descEng;
    }

    public function setDescEng(?string $descEng): self
    {
        $this->descEng = $descEng;

        return $this;
    }

    public function getSortIndex(): ?int
    {
        return $this->sortIndex;
    }

    public function setSortIndex(?int $sortIndex): self
    {
        $this->sortIndex = $sortIndex;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNameRus();
    }
}
