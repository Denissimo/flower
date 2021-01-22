<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Bouquet0
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
     * @var string
     *
     * @ORM\Column(name="desc_rus", type="text")
     */
    private $descRus;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_eng", type="text")
     */
    private $descEng;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available = true;

    /**
     * @var int
     *
     * @ORM\Column(name="multiples", type="integer")
     */
    private $multiples = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_index", type="integer")
     */
    private $sortIndex = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Category0", inversedBy="bouquets")
     */
    private $category;
}