<?php

namespace App\Entity;

use App\Repository\CreepyDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTimeImmutable;

/**
 * @ORM\Entity(repositoryClass=CreepyDataRepository::class)
 */
class CreepyData
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $part;

    /**
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     * @var DateTimeImmutable
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @var bool
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=CreepyId::class, inversedBy="creepyData", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $creepyId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreepyId(): ?CreepyId
    {
        return $this->creepyId;
    }

    public function setCreepyId(CreepyId $creepyId): self
    {
        $this->creepyId = $creepyId;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     *
     * @return CreepyData
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return CreepyData
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return int
     */
    public function getPart(): int
    {
        return $this->part;
    }

    /**
     * @param int $part
     *
     * @return CreepyData
     */
    public function setPart(int $part): self
    {
        $this->part = $part;

        return $this;
    }
}
