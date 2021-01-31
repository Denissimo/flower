<?php

namespace App\Admin;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class FlowerBouquetAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nameRus')
            ->add('descRus')
            ->add('price')
            ->add('leastQuantity')
            ->add('leastSum')
            ->add('sortIndex')
            ->add('category', ModelAutocompleteType::class, [
                'property' => 'nameRus',
                'class' => FlowerCategory::class
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nameRus')
//            ->add('nameEng')
            ->add('leastQuantity')
            ->add('leastSum');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('nameRus')
            ->add('descRus')
            ->add('leastQuantity')
            ->add('leastSum')
            ->add('sortIndex')
        ;
    }
}