<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

class Category0
{
    /**
     * @var string
     *
     * @ORM\Column(name="name_rus", type="string")
     */
    private $nameRus;

    /**
     * @var string
     *
     * @ORM\Column(name="name_eng", type="string")
     */
    private $nameEng;

    /**
     * @ORM\OneToMany(targetEntity="Bouquet0", mappedBy="category")
     */
    private $bouquets;

    public function __construct()
    {
        $this->bouquets = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getNameRus(): string
    {
        return $this->nameRus;
    }

    /**
     * @param string $nameRus
     */
    public function setNameRus(string $nameRus): void
    {
        $this->nameRus = $nameRus;
    }

    /**
     * @return string
     */
    public function getNameEng(): string
    {
        return $this->nameEng;
    }

    /**
     * @param string $nameEng
     */
    public function setNameEng(string $nameEng): void
    {
        $this->nameEng = $nameEng;
    }

    /**
     * @return ArrayCollection
     */
    public function getBouquets(): ArrayCollection
    {
        return $this->bouquets;
    }

    /**
     * @param ArrayCollection $bouquets
     */
    public function setBouquets(ArrayCollection $bouquets): void
    {
        $this->bouquets = $bouquets;
    }
}