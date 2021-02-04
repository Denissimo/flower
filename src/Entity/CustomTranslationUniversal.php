<?php

namespace App\Entity;

use App\Repository\CustomTranslationUniversalRepository;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=CustomTranslationUniversalRepository::class)
 */
class CustomTranslationUniversal
{
    public static $locales = ['en', 'ru', 'de', 'fr', 'es'];
    public static $untrnslated = [
        'en' => 'Translation not found',
        'ru' => 'Перевод не найден',
        'de' => 'Übersetzung nicht gefunden',
        'fr' => 'Traduction introuvable',
        'es' => 'Traducción no encontrada'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $en;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ru;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $de;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $es;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(?string $en): self
    {
        $this->en = $en;

        return $this;
    }

    public function getRu(): ?string
    {
        return $this->ru;
    }

    public function setRu(?string $ru): self
    {
        $this->ru = $ru;

        return $this;
    }

    public function getDe(): ?string
    {
        return $this->de;
    }

    public function setDe(?string $de): self
    {
        $this->de = $de;

        return $this;
    }

    public function getFr(): ?string
    {
        return $this->fr;
    }

    public function setFr(?string $fr): self
    {
        $this->fr = $fr;

        return $this;
    }

    public function getEs(): ?string
    {
        return $this->es;
    }

    public function setEs(?string $es): self
    {
        $this->es = $es;

        return $this;
    }

    public function getByTo(string $to = 'ru')
    {
        if (!in_array($to, self::$locales)) {
            throw new Exception(sprintf('Locale %s is incorrect!', $to));
        }

        return $this->$to;
    }
}
