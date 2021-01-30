<?php

namespace App\Entity;

use App\Repository\FlowerPhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlowerPhotoRepository::class)
 */
class FlowerPhoto extends UploadedFile
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $isThumbnail;

    public function getIsThumbnail(): ?bool
    {
        return $this->isThumbnail;
    }

    public function setIsThumbnail(bool $isThumbnail): self
    {
        $this->isThumbnail = $isThumbnail;

        return $this;
    }
}
