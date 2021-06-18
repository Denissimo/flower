<?php

namespace App\Form;

use App\Entity\FlowerCategory;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FlowerCategoryType extends AbstractType
{
    /**
     * @var  TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * FlowerCategoryType constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FlowerCategory::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->tokenStorage->getToken()->getUser();
        $isUser = $user instanceof User;
        $builder
            ->add(
                'nameRus',
                TextType::class,
                [
                         'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'leastQty',
                IntegerType::class,
                [
//                    'label' => 'zzz',
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'leastSum',
                IntegerType::class,
                [
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'descRus',
                TextType::class,
                [
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'save',
                SubmitType::class,
                [
                    'attr' => ['class' => 'btn btn-danger mart10']
                ]
            );
    }
}