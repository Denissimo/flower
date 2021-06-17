<?php

namespace App\Admin;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerPhoto;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use DateTimeImmutable;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class FlowerPhotoAdmin extends AbstractAdmin
{
    /**
     * @var  TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function setTokenStorage($tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

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
        $formMapper
            ->add('altRus')
            ->add('largeOne')
            ->add('file', FileType::class, [
                'required' => false
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('altRus')
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('user')
            ->add(
                'name',
                null,
                [
                    'label' => 'Picture',
                    'template' => "@sonata_templates/flower_image.html.twig",
                    'row_align' => 'center'
                ]
            )
            ->add(
                'largeOne',
                null,
                [
                    'label' => 'Large One',
                    'template' => "@sonata_templates/flower_large_one.html.twig",
                    'row_align' => 'center'
                ]
            )
            ->add('altRus')
//            ->add('altEng')
            ->add('createdAt',
                null,
                [
                    'format' => 'd.m.Y h:i:s'
                ])
            ->add('updatedAt',
                null,
                [
                    'format' => 'd.m.Y h:i:s'
                ])
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                ],
            ])

        ;
    }

    /**
     * @param FlowerPhoto $object
     */
    public function prePersist($object)
    {
        $this->manageFileUpload($object);
         if (!$object->getUser() instanceof User) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $object->setUser($user);
        }
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