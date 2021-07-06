<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;

class LegalEntityAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user',
                ModelAutocompleteType::class,
                [
                    'property' => 'username',
                ]
            )
            ->add(
                'head', ModelType::class,
                [
                    'choice_translation_domain' => false,
                ]
            )
            ->add('fullName')
            ->add('shortName')
            ->add(
                'representative',
                ModelType::class,
                [
                    'choice_translation_domain' => false,
                    'multiple' => true
                ]
            )
            ->add('active')
            ->add('ogrn')
            ->add('inn')
            ->add('phone')
            ->add('email');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fullName')
            ->add('shortName')
            ->add('user',
                ModelAutocompleteFilter::class,
                [],
                null,
                [
                    'property' => 'username'
                ]
            )
            ->add('active')
            ->add('ogrn')
            ->add('inn')
            ->add('phone')
            ->add('email');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('fullName')
            ->add('shortName')
            ->add('user')
            ->add('head')
            ->add('representative')
            ->add(
                'active',
                null,
                [
                    'editable' => true
                ]
            )
            ->add('ogrn')
            ->add('inn')
            ->add('phone')
            ->add('email')
            ->add(
                'createdAt',
                null,
                [
                    'format'=>'d.m.Y h:i:s'
                ]
            )
            ->add('updatedAt',
                null,
                [
                    'format'=>'d.m.Y h:i:s'
                ]
            )
            ->add('_action', null, [
                'actions' => [
                    'edit'   => [],
                    'delete' => [],
                ],
            ])
        ;
    }
}