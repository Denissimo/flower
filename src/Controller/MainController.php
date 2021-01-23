<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function main(): Response
    {
        $number = random_int(0, 100);

        return $this->render('test.html.twig', [
            'id' => 155,
            'number' => $number,
        ]);
    }
}