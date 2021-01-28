<?php

namespace App\Entity;

use App\Repository\FlowerCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerCategoryRepository::class)
 */
class FlowerCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameRus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameEng;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $leatQty;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leatSum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRus(): ?string
    {
        return $this->nameRus;
    }

    public function setNameRus(string $nameRus): self
    {
        $this->nameRus = $nameRus;

        return $this;
    }

    public function getNameEng(): ?string
    {
        return $this->nameEng;
    }

    public function setNameEng(string $nameEng): self
    {
        $this->nameEng = $nameEng;

        return $this;
    }

    public function getLeatQty(): ?int
    {
        return $this->leatQty;
    }

    public function setLeatQty(?int $leatQty): self
    {
        $this->leatQty = $leatQty;

        return $this;
    }

    public function getLeatSum(): ?int
    {
        return $this->leatSum;
    }

    public function setLeatSum(?int $leatSum): self
    {
        $this->leatSum = $leatSum;

        return $this;
    }
}
