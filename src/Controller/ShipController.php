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
            'base.html.twig');
    }
}