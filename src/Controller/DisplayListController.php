<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\DebugBundle;

class DisplayListController extends AbstractController
{
   
    #[Route('/display/list', name: 'app_display_list')]
    public function index(CallApiService $callApiService): Response
    {    
        
        //dd($callApiService->getVersaillesData());
        return $this->render('display_list/index.html.twig', [
            'listeEtablissements' => $callApiService->getVersaillesData(),
        ]);
    }
}
