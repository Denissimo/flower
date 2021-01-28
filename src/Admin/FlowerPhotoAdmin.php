<?php

namespace App\Admin;

use App\Entity\FlowerPhoto;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Dotenv\Dotenv;

final class FlowerPhotoAdmin extends AbstractAdmin
{
    /**
     * @var string
     */
    private $imagePath;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('isThumbnail')
            ->add('file', FileType::class, [
                'required' => false
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('isThumbnail');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('isThumbnail');
    }

    /**
     * @param FlowerPhoto $image
     */
    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    /**
     * @param FlowerPhoto $image
     */
    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    /**
     * @param FlowerPhoto $image
     */
    private function manageFileUpload($image)
    {
        $image->upload();
    }

    /**
     * @param string $imagePath
     *
     * @return FlowerPhotoAdmin
     */
    public function setImagePath(string $imagePath): FlowerPhotoAdmin
    {
        $this->imagePath = $imagePath;

        return $this;
    }
}