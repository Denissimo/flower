<?php

namespace App\Entity;

use App\Repository\FlowerBouquetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTimeImmutable;

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

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default":0})
     */
    private $price;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * @var DateTimeImmutable
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTimeImmutable
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=FlowerPhoto::class, mappedBy="flowerBouquet")
     */
    private $flowerPhotos;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerShop::class, inversedBy="flowerBouquets")
     */
    private $shop;

    public function __construct()
    {
        $this->flowerPhotos = new ArrayCollection();
    }

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNameRus();
    }

    /**
     * @return Collection|FlowerPhoto[]
     */
    public function getFlowerPhotos(): Collection
    {
        return $this->flowerPhotos;
    }

    public function addFlowerPhoto(FlowerPhoto $flowerPhoto): self
    {
        if (!$this->flowerPhotos->contains($flowerPhoto)) {
            $this->flowerPhotos[] = $flowerPhoto;
            $flowerPhoto->setFlowerBouquet($this);
        }

        return $this;
    }

    public function removeFlowerPhoto(FlowerPhoto $flowerPhoto): self
    {
        if ($this->flowerPhotos->removeElement($flowerPhoto)) {
            // set the owning side to null (unless already changed)
            if ($flowerPhoto->getFlowerBouquet() === $this) {
                $flowerPhoto->setFlowerBouquet(null);
            }
        }

        return $this;
    }

    /**
     * @param FlowerBouquet|object $object
     */
    private function setPhotos($object): void
    {
        foreach ($object->getUserDocuments() as $photo) {

            /** @var FlowerPhoto $photo */
            $photo->setFlowerBouquet($object);
        }
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

    public function getShop(): ?FlowerShop
    {
        return $this->shop;
    }

    public function setShop(?FlowerShop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

}
