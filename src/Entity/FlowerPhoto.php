<?php

namespace App\Entity;

use App\Repository\FlowerPhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=FlowerPhotoRepository::class)
 */
class FlowerPhoto extends UploadedFile
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $altRus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $altEng;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerBouquet::class, inversedBy="flowerPhotos")
     */
    private $flowerBouquet;

    /**
     * @Gedmo\Timestampable(on="update")
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=FlowerPhoto::class, inversedBy="smallOne", cascade={"persist", "remove"})
     */
    private $largeOne;

    /**
     * @ORM\OneToOne(targetEntity=FlowerPhoto::class, mappedBy="largeOne", cascade={"persist", "remove"})
     */
    private $smallOne;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAltRus() ?? 'no description';
//        return '<img src="https://svalko.org/data/2013_08_08_12_02_pbs_twimg_com_media_BRIUKgTCMAIecyk.jpg" />';
    }

    public function getAltRus(): ?string
    {
        return $this->altRus;
    }

    public function setAltRus(?string $altRus): self
    {
        $this->altRus = $altRus;

        return $this;
    }

    public function getAltEng(): ?string
    {
        return $this->altEng;
    }

    public function setAltEng(?string $altEng): self
    {
        $this->altEng = $altEng;

        return $this;
    }

    public function getFlowerBouquet(): ?FlowerBouquet
    {
        return $this->flowerBouquet;
    }

    public function setFlowerBouquet(?FlowerBouquet $flowerBouquet): self
    {
        $this->flowerBouquet = $flowerBouquet;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
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

    public function getLargeOne(): ?self
    {
        return $this->largeOne;
    }

    public function setLargeOne(?self $largeOne): self
    {
        $this->largeOne = $largeOne;

        return $this;
    }

    public function getSmallOne(): ?self
    {
        return $this->smallOne;
    }

    public function setSmallOne(?self $smallOne): self
    {
        // unset the owning side of the relation if necessary
        if ($smallOne === null && $this->smallOne !== null) {
            $this->smallOne->setLargeOne(null);
        }

        // set the owning side of the relation if necessary
        if ($smallOne !== null && $smallOne->getLargeOne() !== $this) {
            $smallOne->setLargeOne($this);
        }

        $this->smallOne = $smallOne;

        return $this;
    }
}
