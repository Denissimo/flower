<?php

namespace App\Admin;

use App\Entity\FlowerCategory;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class FlowerCategoryAdmin extends AbstractAdmin
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

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nameRus')
//            ->add('nameEng')
            ->add('descRus')
//            ->add('descEng')
            ->add('leastQty')
            ->add('leastSum')
            ->add('sortIndex')
            ->add('title')
            ->add('keywords')
            ->add('description')
            ->add('h1')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nameRus')
//            ->add('nameEng')
            ->add('leastQty')
            ->add('leastSum')
            ->add('title')
            ->add('keywords')
            ->add('description')
            ->add('h1')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('user')
            ->add('nameRus')
//            ->add('nameEng')
            ->add('descRus')
//            ->add('descEng')
            ->add('leastQty')
            ->add('leastSum')
            ->add('sortIndex')
            ->add('title')
            ->add('keywords')
            ->add('description')
            ->add('h1')
        ;
    }

    /**
     * @param FlowerCategory $object
     */
    public function prePersist($object)
    {
        if (!$object->getUser() instanceof User) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $object->setUser($user);
        }
    }
}