<?php

namespace App\Admin;

use App\Entity\Individual;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;
use Sonata\Form\Type\DateTimeRangePickerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class IndividualAdmin extends AbstractAdmin
{
    /**
     * @var  TokenStorageInterface
     */
    private $tokenStorage;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user', ModelAutocompleteType::class, [
                'property' => 'username',
                'class' => User::class,
                'required' => false
            ])
            ->add('placeOfBirth')
            ->add('residence')
            ->add('snils')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user',
                ModelAutocompleteFilter::class,
                [],
                null,
                [
                    'property' => 'username'
                ]
            )
            ->add('placeOfBirth')
            ->add('residence')
            ->add('snils')
            ->add('createdAt', DateRangeFilter::class, ['field_type' => DateTimeRangePickerType::class])
            ->add('updatedAt', DateRangeFilter::class, ['field_type' => DateTimeRangePickerType::class]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('user', ModelType::class, [
                'property' => 'username',
                'class' => User::class
            ])
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('dateOfBirthString',
                null,
                [
                    'format' => 'd.m.Y'
                ]
            )
            ->add('placeOfBirth')
            ->add('residence')
            ->add('snils')
            ->add('phone', TextType::class)
            ->add('email', EmailType::class)
            ->add(
                'createdAt',
                null,
                [
                    'format' => 'd.m.Y h:i:s'
                ]
            )
            ->add('updatedAt',
                null,
                [
                    'format' => 'd.m.Y h:i:s'
                ]
            )
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        /** @var Individual $object */
        if (!$object->getUser() instanceof User) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $object->setUser($user);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        /** @var Individual $object */
        if (!$object->getUser() instanceof User) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $object->setUser($user);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function preValidate($object)
    {
        /** @var Individual $object */
        if (!$object->getUser() instanceof User) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $object->setUser($user);
        }
    }

    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function setTokenStorage($tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
}