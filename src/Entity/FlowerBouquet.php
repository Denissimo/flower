<?php

namespace App\Entity;

use App\Repository\FlowerBouquetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerBouquetRepository::class)
 */
class FlowerBouquet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameRus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameEng;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descRus;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descEng;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerCategory::class, inversedBy="flowerBouquets")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerPhoto::class, inversedBy="flowerBouquetByPhoto")
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerPhoto::class, inversedBy="flowerBouquetByThumbnail")
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $sortIndex;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $leastQuantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leastSum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRus(): ?string
    {
        return $this->nameRus;
    }

    public function setNameRus(?string $nameRus): self
    {
        $this->nameRus = $nameRus;

        return $this;
    }

    public function getNameEng(): ?string
    {
        return $this->nameEng;
    }

    public function setNameEng(?string $nameEng): self
    {
        $this->nameEng = $nameEng;

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

    public function getCategory(): ?FlowerCategory
    {
        return $this->category;
    }

    public function setCategory(?FlowerCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPhoto(): ?FlowerPhoto
    {
        return $this->photo;
    }

    public function setPhoto(?FlowerPhoto $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getThumbnail(): ?FlowerPhoto
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?FlowerPhoto $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): self
    {
        $this->available = $available;

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

    public function getLeastQuantity(): ?int
    {
        return $this->leastQuantity;
    }

    public function setLeastQuantity(?int $leastQuantity): self
    {
        $this->leastQuantity = $leastQuantity;

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
}
