<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use DateTimeInterface;

class UploadedFile
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var ?File
     */
    protected $file = null;

    /**
     * @var ?string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name = null;

    /**
     * @var ?int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $size = null;

    /**
     * @var ?string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mimeType = null;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @var ?DateTimeInterface
     */
    protected $createdAt = null;

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $id
     *
     * @return UploadedFile
     */
    public function setId(int $id): UploadedFile
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ?File
     */
    public function getFile(): ?File
    {
        return $this->file;
    }

    /**
     * @param ?File $file
     *
     * @return UploadedFile
     */
    public function setFile(?File $file): UploadedFile
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $name
     *
     * @return UploadedFile
     */
    public function setName(?string $name): UploadedFile
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ?int
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param ?int $size
     *
     * @return UploadedFile
     */
    public function setSize(?int $size): UploadedFile
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param ?string $mimeType
     *
     * @return UploadedFile
     */
    public function setMimeType(?string $mimeType): UploadedFile
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return ?DateTimeInterface
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param ?DateTimeInterface $createdAt
     *
     * @return UploadedFile
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): UploadedFile
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}