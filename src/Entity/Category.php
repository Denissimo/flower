<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $keywords;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority = 0;

    public function getId(): int
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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): Category
    {
        $this->priority = $priority;

        return $this;
    }
}
