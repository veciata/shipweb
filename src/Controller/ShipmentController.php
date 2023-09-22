<?php

namespace App\Controller;

use App\Entity\ShipmentEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\KargoFormType; // Import your form type
use App\Repository\ShipmentEntityRepository; 

class ShipmentController extends AbstractController
{
    #[Route('/shipment', name: 'app_shipment')]
    public function shipment(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KargoFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Get the form data
            $formData = $form->getData();

            // Create a new ShipmentEntity object and set its properties
            $shipment = new ShipmentEntity();
            $shipment->setSender($formData['sender']);
            $shipment->setReceiver($formData['receiver']);
            $shipment->setsender_country($formData['sender_country']);
            $shipment->setreceiver_country($formData['reciever_country']);
            $shipment->setDescription($formData['description']);

            // Persist the entity to the database
            $entityManager->persist($shipment);
            $entityManager->flush();

            // Redirect or return a response
            return $this->redirectToRoute('/shipments');
            // For example, you can redirect to a success page or render a confirmation message
        }

        return $this->render('shipment/shipment.html.twig', [
            'controller_name' => 'ShipmentController',
            'form' => $form->createView(),
        ]);
    }
    
#[Route('/shipments', name: 'app_shipments')]
public function shipments(ShipmentEntityRepository $shipmentRepository): Response 
{
  $shipments = $shipmentRepository->findAll();
  
  return $this->render('shipment/shipments.html.twig', [
    'controller_name' => 'ShipmentController',
    'shipments' => $shipments,
  ]);
}

   
    private function generateUniqueTrackingNumber(): string
    {
        $uniqueText = uniqid('', true);
        return substr($uniqueText, 0, 10);
    }
}
