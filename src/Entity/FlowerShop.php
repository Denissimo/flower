<?php

namespace App\Entity;

use App\Repository\FlowerShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=FlowerShopRepository::class)
 */
class FlowerShop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="flowerShops")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $color;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=FlowerBouquet::class, mappedBy="shop")
     */
    private $flowerBouquets;

    /**
     * @ORM\ManyToOne(targetEntity=FlowerShopLogo::class)
     */
    private $logo;

    public function __construct()
    {
        $this->flowerBouquets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
            $flowerBouquet->setShop($this);
        }

        return $this;
    }

    public function removeFlowerBouquet(FlowerBouquet $flowerBouquet): self
    {
        if ($this->flowerBouquets->removeElement($flowerBouquet)) {
            // set the owning side to null (unless already changed)
            if ($flowerBouquet->getShop() === $this) {
                $flowerBouquet->setShop(null);
            }
        }

        return $this;
    }

    public function getLogo(): ?FlowerShopLogo
    {
        return $this->logo;
    }

    public function setLogo(?FlowerShopLogo $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
