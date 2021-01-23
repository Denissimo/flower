<?php

namespace App\Entity;

use App\Repository\CreepyDataRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity=CreepyId::class, inversedBy="creepyData", cascade={"persist", "remove"})
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
}
