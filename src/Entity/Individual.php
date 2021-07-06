<?php

namespace App\Entity;

use App\Repository\IndividualRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=IndividualRepository::class)
 */
class Individual implements UserRightsInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="individual", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     *
     * @var User
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $residence;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $snils;

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): UserRightsInterface
    {
        $this->user = $user;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(?string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getResidence(): ?string
    {
        return $this->residence;
    }

    public function setResidence(?string $residence): self
    {
        $this->residence = $residence;

        return $this;
    }

    public function getSnils(): ?string
    {
        return $this->snils;
    }

    public function setSnils(?string $snils): self
    {
        $this->snils = $snils;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->user->getEmail();
    }

    public function setEmail(?string $email): self
    {
        $this->user->setEmail($email);

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->user->getPhone();
    }

    public function setPhone(?string $phone): self
    {
        $this->user->setPhone($phone);

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->user->getFirstname();
    }

    public function setFirstName(?string $firstName): self
    {
        $this->user->setFirstname($firstName);

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->user->getLastname();
    }

    public function setLastName(?string $lastName): self
    {
        $this->user->setLastname($lastName);

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->user->getMiddlename();
    }

    public function setMiddleName(?string $lastName): self
    {
        $this->user->setMiddlename($lastName);

        return $this;
    }

    public function getDateOfBirth(): ?\DateTime
    {
        return $this->user->getDateOfBirth();
    }

    public function getDateOfBirthString(): string
    {
        return $this->user->getDateOfBirth() instanceof \DateTime ?
            $this->user->getDateOfBirth()->format('d.m.Y') : '';
    }

    public function setDateOfBirth(?\DateTime $dateOfBirth): self
    {
        $this->user->setDateOfBirth($dateOfBirth);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function __toString(): string
    {
        return sprintf(
            '%s %s %s (%s)',
            $this->user->getLastname(),
            $this->user->getFirstname(),
            $this->user->getMiddlename(),
            $this->id
        );
    }

    public function getFio()
    {
        return sprintf('%s %s %s', $this->user->getLastname(), $this->user->getFirstname(), $this->user->getMiddlename());
    }
}
