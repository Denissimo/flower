<?php

namespace App\Admin;

use App\Entity\FlowerPhoto;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use DateTimeImmutable;

final class FlowerPhotoAdmin extends AbstractAdmin
{
    /**
     * @var string
     */
    private $imagePath;

    /**
     * @var string
     */
    private $rootPath;

    /**
     * @var string
     */
    public $imageShowPath;

    public function __construct($code, $class, $baseControllerName, $imagePath, $rootPath, $imageShowPath)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->imagePath = $imagePath;
        $this->rootPath = $rootPath;
        $this->imageShowPath = $imageShowPath;
    }


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
            ->add('isThumbnail')
            ->add(
                'name',
                null,
                [
                    'label' => 'Picture',
                    'template' => "@sonata_templates/flower_image.html.twig",
                    'row_align' => 'center'
                ]
            )
        ;
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
        $this->upload($image);
    }

    /**
     * @param FlowerPhoto $image
     */
    private function upload(FlowerPhoto $image)
    {
        if (null === $image->getFile()) {
            return;
        }

        $imageFullPath = $this->buildImageFullPath();

        $file = $image->getFile();
        $randomName = (new DateTimeImmutable())->format('YmdHis') .
            rand(1000, 999999) . $image->getFile()->getClientOriginalName();
        $image->setName($randomName);
        $file->move(
            $imageFullPath,
            $randomName
        );

        // set the path property to the filename where you've saved the file
        $this->filename = $image->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $image->setFile(null);
    }

    /**
     * @return string
     */
    private function buildImageFullPath()
    {
        $fullPath = $this->rootPath . $this->imagePath;

        return $fullPath;
    }
}