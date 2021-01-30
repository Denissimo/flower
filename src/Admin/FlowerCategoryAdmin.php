<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class FlowerCategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nameRus')
            ->add('nameEng')
            ->add('descRus')
            ->add('descEng')
            ->add('leastQty')
            ->add('leastSum')
            ->add('sortIndex')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nameRus')
            ->add('nameEng')
            ->add('leastQty')
            ->add('leastSum');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('nameRus')
            ->add('nameEng')
            ->add('descRus')
            ->add('descEng')
            ->add('leastQty')
            ->add('leastSum')
            ->add('sortIndex')
        ;
    }
}