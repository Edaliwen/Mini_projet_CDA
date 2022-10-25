<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SayHelloController extends AbstractController
{
    #[Route('/say/hello', name: 'app_say_hello')]
    public function index(): Response
    {
        return $this->render('say_hello/index.html.twig', [
            'controller_name' => 'SayHelloController',
        ]);
    }
}
