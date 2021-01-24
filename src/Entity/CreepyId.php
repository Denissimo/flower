<?php

namespace App\Entity;

use App\Repository\CreepyIdRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * @ORM\Entity(repositoryClass=CreepyIdRepository::class)
 */
class CreepyId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="creepy_id", type="integer")
     */
    private $creepyId;

    //@Gedmo\Timestampable(on="create")

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="parsed_at", type="datetime", nullable=true)
     */
    private $parsedAt;

    /**
     * @ORM\OneToMany(targetEntity=CreepyData::class, mappedBy="creepyId", cascade={"persist", "remove"})
     */
    private $creepyData;

    /**
     * CreepyId constructor.
     */
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreepyId(): ?int
    {
        return $this->creepyId;
    }

    public function setCreepyId(int $creepyId): self
    {
        $this->creepyId = $creepyId;

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

    public function getParsedAt(): ?\DateTimeInterface
    {
        return $this->parsedAt;
    }

    public function setParsedAt(?\DateTimeInterface $parsedAt): self
    {
        $this->parsedAt = $parsedAt;

        return $this;
    }

    public function getCreepyData(): ?CreepyData
    {
        return $this->creepyData;
    }

    public function setCreepyData(CreepyData $creepyData): self
    {
        // set the owning side of the relation if necessary
        if ($creepyData->getCreepyId() !== $this) {
            $creepyData->setCreepyId($this);
        }

        $this->creepyData = $creepyData;

        return $this;
    }
}
