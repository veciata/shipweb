<?php

namespace App\Controller;

use App\Entity\ShipmentEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\KargoFormType; 
use App\Repository\ShipmentEntityRepository; 
use Symfony\Component\Security\Core\Security;

class ShipmentController extends AbstractController
{

    
    
    #[Route('/shipment', name: 'app_shipment')]
    public function shipment(Request $request, EntityManagerInterface $entityManager): Response
    {
      $form = $this->createForm(KargoFormType::class);
      $form->handleRequest($request);
        return $this->render('shipment/shipment.html.twig', [
            'controller_name' => 'ShipmentController',
            'form' => $form->createView(),
        ]);
      

      if ($form->isSubmitted() && $form->isValid()) {
         
          // Get the form data
          $formData = $form->getData();
          // Create a new ShipmentEntity object and set its properties
          $shipment = new ShipmentEntity();         
          $shipment->setsender($formData['sender']);
          $shipment->setreceiver($formData['receiver']);
          $shipment->setsender_country($formData['sender_country']);
          $shipment->setreceiver_country($formData['receiver_country']);
          $shipment->setdescription($formData['description']);
          print_r('$shipment');
          // Persist the entity to the database
          $entityManager->persist($shipment);
          $entityManager->flush();
          $message = "Kargo başarıyla oluşturuldu.";

          return $this->render('shipment/shipment.html.twig', [
            'message' => $message,]);
        }
        
    }
    
#[Route('/shipments', name: 'app_shipments')]
public function shipments(ShipmentEntityRepository $shipmentRepository,Security $security): Response 
{
  $user = $security->getUser();
  $username = $user->getUsername();
  $shipments = $shipmentRepository->findBy(['sender' => $username]);
  return $this->render('shipment/shipments.html.twig', [
    'controller_name' => 'ShipmentController',
    'shipments' => $shipments,
  ]);
}


   
  
}
