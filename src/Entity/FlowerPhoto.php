<?php

namespace App\Entity;

use App\Repository\FlowerPhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerPhotoRepository::class)
 */
class FlowerPhoto extends UploadedFile
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $isThumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=FlowerBouquet::class, mappedBy="photo")
     */
    private $flowerBouquetByPhoto;

    /**
     * @ORM\OneToMany(targetEntity=FlowerBouquet::class, mappedBy="thumbnail")
     */
    private $flowerBouquetByThumbnail;

    public function __construct()
    {
        $this->flowerBouquetByPhoto = new ArrayCollection();
    }

    public function getIsThumbnail(): ?bool
    {
        return $this->isThumbnail;
    }

    public function setIsThumbnail(bool $isThumbnail): self
    {
        $this->isThumbnail = $isThumbnail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return FlowerPhoto
     */
    public function setDescription(string $description): FlowerPhoto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|FlowerBouquet[]
     */
    public function getFlowerBouquetByPhoto(): Collection
    {
        return $this->flowerBouquetByPhoto;
    }

    public function addFlowerBouquetsPhoto(FlowerBouquet $flowerBouquetsPhoto): self
    {
        if (!$this->flowerBouquetByPhoto->contains($flowerBouquetsPhoto)) {
            $this->flowerBouquetByPhoto[] = $flowerBouquetsPhoto;
            $flowerBouquetsPhoto->setPhoto($this);
        }

        return $this;
    }

    public function removeFlowerBouquetsPhoto(FlowerBouquet $flowerBouquetsPhoto): self
    {
        if ($this->flowerBouquetByPhoto->removeElement($flowerBouquetsPhoto)) {
            // set the owning side to null (unless already changed)
            if ($flowerBouquetsPhoto->getPhoto() === $this) {
                $flowerBouquetsPhoto->setPhoto(null);
            }
        }

        return $this;
    }

    public function getFlowerBouquetByThumbnail(): ?FlowerBouquet
    {
        return $this->flowerBouquetByThumbnail;
    }

    public function setFlowerBouquetByThumbnail(?FlowerBouquet $flowerBouquetByThumbnail): self
    {
        // unset the owning side of the relation if necessary
        if ($flowerBouquetByThumbnail === null && $this->flowerBouquetByThumbnail !== null) {
            $this->flowerBouquetByThumbnail->setThumbnail(null);
        }

        // set the owning side of the relation if necessary
        if ($flowerBouquetByThumbnail !== null && $flowerBouquetByThumbnail->getThumbnail() !== $this) {
            $flowerBouquetByThumbnail->setThumbnail($this);
        }

        $this->flowerBouquetByThumbnail = $flowerBouquetByThumbnail;

        return $this;
    }
}
