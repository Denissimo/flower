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

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $imageData = getenv('IMAGES_DATA');

        $imagePath = __DIR__ . '/../../public/images';
        $ls = scandir($imagePath);

        $file = $this->getFile();
        $file->move(
            $imagePath,
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->filename = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server.
     */
    public function lifecycleFileUpload()
    {
//        $this->upload();
    }

}
