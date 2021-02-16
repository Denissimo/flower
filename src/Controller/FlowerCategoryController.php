<?php

namespace App\Controller;

use App\Entity\FlowerCategory;
use App\Form\FlowerCategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FlowerCategoryController extends AbstractController
{
    public function edit(Request $request, int $categoryId): Response
    {
        $repo = $this->getDoctrine()->getRepository('App:FlowerCategory');
        $flowerCategory = $repo->find($categoryId);
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        $allAttributes = $request->attributes->all();

        $data['categoryId'] = $categoryId;
        $form = $this->createForm(
            FlowerCategoryType::class,
            $flowerCategory,
            [
//                'action' => $this->generateUrl('flowerCategorySave'),
                'method' => 'POST',
            ]
        )

        ;
        $view = $form->createView();
        $firmData = $form->getData();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            /** @var FlowerCategory $flowerCategory */
            $flowerCategory = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
             $entityManager->flush();

//            return $this->redirectToRoute('task_success');
        }

        return $this->render('Forms/flower_category.html.twig', [
            'data' => $data,
            'form' => $form->createView()
        ]);
    }

    public function save(Request $request): Response
    {
        $form = $this->createForm(FlowerCategoryType::class);
        $form->handleRequest($request);
        /** @var FlowerCategory $flowerCategory */
        $flowerCategory = $form->getData();

//        return $this->redirectToRoute('flowerCategoryId', ['categoryId' => $flowerCategory->getId()]);
//        return $this->redirectToRoute('flowerCategoryId');
        $data['categoryId'] = $flowerCategory->getId();
        return $this->render('Forms/flower_category.html.twig', [
            'data' => [],
            'form' => $form->createView()
        ]);
    }
}