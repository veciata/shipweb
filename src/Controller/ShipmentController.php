<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\KargoFormType; // Import your form type
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    
class ShipmentController extends AbstractController
{
    #[Route('/shipment', name: 'app_shipment')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KargoFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get the form data
            $formData = $form->getData();

            // Create a new ShipmentEntity object and set its properties
            $shipment = new ShipmentEntity();
            $shipment->setNereden($formData['nereden']);
            $shipment->setNereye($formData['nereye']);
            $shipment->setSender($formData['sender']);
            $shipment->setReceiver($formData['receiver']);
            $shipment->setDescription($formData['description']);

            // Persist the entity to the database
            $entityManager->persist($shipment);
            $entityManager->flush();

            // Redirect or return a response
            // For example, you can redirect to a success page or render a confirmation message
        }

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
