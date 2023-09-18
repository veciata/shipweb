<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ShipController extends AbstractController
{
   
    #[Route('/', name: 'app_ship')]
    public function index()
    {
        return $this->render(
            'index.html.twig');
    }
    #[Route('/about', name: 'about')]
    public function about()
    {
        return $this->render(
            'about.html.twig');
    }
    #[Route('/jobs', name: 'jobs')]
    public function jobs()  {
        return$this->render(
            'jobs.html.twig');
    }
    
}
