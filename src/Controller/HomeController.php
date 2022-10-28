<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home')]
    public function home(): Response
    {
        $number = random_int(0, 100);
        return $this->render('home/accueil.html.twig');
    }
}
?>