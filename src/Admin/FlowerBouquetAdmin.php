<?php

namespace App\Admin;

use App\Entity\FlowerBouquet;
use App\Entity\FlowerCategory;
use App\Entity\FlowerPhoto;
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

final class FlowerBouquetAdmin extends AbstractAdmin
{
    /**
     * @var  TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var string
     */
    public $imageShowPath;

    public function __construct($code, $class, $baseControllerName, $imageShowPath)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->imageShowPath = $imageShowPath;
    }
    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function setTokenStorage($tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->getModelManager()
            ->createQuery(FlowerPhoto::class)
        ;
//        $em = $this->getEntityManager(DmsRule::class);
        $query = $this->createQuery();
        /** @var FlowerPhoto[] $thumbNails */
//        $thumbNails = $this->getModelManager()->findBy(FlowerPhoto::class, ['isThumbnail' => true]);
//        $thumbNailsChoices = $this->buildChoices($thumbNails);


//        $query = $em->createQueryBuilder()
//            ->select('d')
//            ->from('CoreBundle:DmsRule', 'd')
//            ->where('d.decisionMakingComponent = :component_id')
//            ->setParameters([
//                'component_id' => $dms_component->getId(),
//            ])
//            ->orderBy('d.priority');

        $formMapper
            ->add('user', ModelAutocompleteType::class, [
                'property' => 'username',
                'class' => User::class,
                'required' => false
            ])
            ->add('shop', ModelType::class,
                [
                    'choice_translation_domain' => false,
                    'required' => false,
                ]
            )
            ->add('nameRus')
            ->add('descRus')
            ->add('price')
            ->add('leastQuantity')
            ->add('leastSum')
            ->add('sortIndex')
//            ->add('category', ModelAutocompleteType::class, [
//                'property' => 'nameRus',
//                'class' => FlowerCategory::class
//            ])
            ->add('category', ModelType::class, [
                'choice_translation_domain' => false,
                'class' => FlowerCategory::class
            ])
            ->add('flowerPhotos')
//                , ChoiceType::class, [
//                'choices' => $thumbNailsChoices
//                'attr' => ['data-sonata-select2'=>'false'],
//                'choice_translation_domain' => false,
//                'multiple' => true,
//                'choices' => [
//                    'Apple' => 1,
//                    'Banana' => 2,
//                    'Durian' => 3,
//                ],
//                'choice_attr' => [
//                    'Apple' => ['style' => 'height:50px;background: url(http://www.blogger.com/img/icon_28_followers.png) 10px 10px no-repeat;color:#FFFF00;font-weight:bold;'],
//                    'Banana' => ['data-color' => 'Yellow'],
//                    'Durian' => ['data-color' => 'Green'],
//                ],
//            ])
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
            ->add('user')
            ->add('shop')
            ->add(
                'Picture',
                null,
                [
                    'template' => "@sonata_templates/flower_bouquet_images.html.twig",
                ]
            )
            ->add('nameRus')
            ->add('descRus')
            ->add('leastQuantity')
            ->add('leastSum')
            ->add('sortIndex')
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                ],
            ])
        ;
    }

    /**
     * @param FlowerPhoto[] $photos
     *
     * @return FlowerPhoto[]
     */
    private function buildChoices ($photos)
    {
        $photoChoices = [];
        foreach ($photos as $photo) {
            $photoChoices[$photo->__toString()] = $photo;
        }
        return $photoChoices;
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
        $this->setPhotos($object);
    }

    /**
     * @param FlowerBouquet $object
     */
    public function preUpdate($object)
    {
        $this->setPhotos($object);
    }

    /**
     * @param FlowerBouquet|object $object
     */
    private function setPhotos($object): void
    {
        foreach ($object->getFlowerPhotos() as $photo) {
            /** @var FlowerPhoto $photo */
            $photo->setFlowerBouquet($object);
        }
    }
}