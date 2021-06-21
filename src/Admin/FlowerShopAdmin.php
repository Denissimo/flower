<?php

namespace App\Admin;

use App\Entity\FlowerCategory;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class FlowerShopAdmin extends AbstractAdmin
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
        $formMapper
            ->add('user')
            ->add('name')
            ->add('description')
            ->add(
                'color',
                ColorType::class
            )

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user')
            ->add('name')
            ->add('description')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('user')
            ->add('name')
            ->add('description')
            ->add('color',
                ColorType::class,
                [
//                    'editable' => true,
                    'template' => "@sonata_templates/color_show.html.twig",
                ]
            )
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                ],
            ])
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