<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoutesController extends AbstractController
{
    public function test(): Response
    {
        $number = random_int(0, 100);

        return $this->render('test.html.twig', [
            'number' => $number,
        ]);
    }
}