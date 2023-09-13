<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShipmentController extends AbstractController
{
    
    #[Route('/shipment', name: 'app_shipment')]
    public function index(): Response
    {
        $form = new Form();
        return $this->render('shipment/index.html.twig', [
            'controller_name' => 'ShipmentController',
            'form' => $form->createView(),
        ]);
    }
    
    private function generateUniqueTrackingNumber(): string
    {
        $uniqueText = uniqid('', true);
        return substr($uniqueText, 0, 10);
    }
}
