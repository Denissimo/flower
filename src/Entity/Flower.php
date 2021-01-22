<?php

namespace App\Entity;

use App\Repository\FlowerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerRepository::class)
 */
class Flower
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name_rus", type="string", length=255)
     */
    private $nameRus;

    /**
     * @ORM\Column(name="name_eng", type="string", length=255)
     */
    private $nameEng;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
