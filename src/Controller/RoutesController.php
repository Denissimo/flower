<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoutesController extends AbstractController
{
    public function test(string $id): Response
    {
        $number = random_int(0, 100);

        return $this->render('test.html.twig', [
            'id' => $id,
            'number' => $number,
        ]);
    }
}