<?php

namespace App\Admin;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerCategory;
use App\Entity\FlowerPhoto;
use App\Entity\Order;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class OrderAdmin extends AbstractAdmin
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
        $formMapper->add('user')
            ->add('seller')
            ->add('status',
                ChoiceType::class,
                ['choices' => array_flip(Order::$statuses)]
            )
            ->add('amount')
            ->add('paid')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('seller')
            ->add('status')
            ->add('amount')
            ->add('paid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('user')
            ->add('seller')
            ->add('status',
                'choice',
                ['choices' => Order::$statuses])
            ->add('amount')
            ->add('paid', null, ['editable' => true])
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
     * @param FlowerBouquet $object
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