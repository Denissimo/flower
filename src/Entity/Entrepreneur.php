<?php

namespace App\Entity;

use App\Repository\EntrepreneurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=EntrepreneurRepository::class)
 */
class Entrepreneur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Individual::class)
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Individual
     */
    private $head;

    /**
     * @ORM\ManyToMany(targetEntity=Individual::class)
     */
    private $representative;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ogrn;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $inn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean", options={"default":true})
     */
    private $active;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->representative = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getHead(): ?Individual
    {
        return $this->head;
    }

    public function setHead(?Individual $head): self
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return Collection|Individual[]
     */
    public function getRepresentative(): Collection
    {
        return $this->representative;
    }

    public function addRepresentative(Individual $representative): self
    {
        if (!$this->representative->contains($representative)) {
            $this->representative[] = $representative;
        }

        return $this;
    }

    public function removeRepresentative(Individual $representative): self
    {
        $this->representative->removeElement($representative);

        return $this;
    }

    public function getOgrn(): ?string
    {
        return $this->ogrn;
    }

    public function setOgrn(?string $ogrn): self
    {
        $this->ogrn = $ogrn;

        return $this;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function setInn(?string $inn): self
    {
        $this->inn = $inn;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            'ИП %s %s %s (%s)',
            $this->head->getLastname(),
            $this->head->getFirstname(),
            $this->head->getMiddleName(),
            $this->id
        );
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
}
