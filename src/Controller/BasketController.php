<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BasketController extends AbstractController
{
    public function add(Request $request): Response
    {
        $number = random_int(0, 100);
        $all = $request->request->all();
        $a = json_encode([1]);

        return $this->render('json.html.twig', [
            'data' => $request->request->all()
        ]);
    }
}