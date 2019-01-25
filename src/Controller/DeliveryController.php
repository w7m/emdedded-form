<?php
/**
 * Created by PhpStorm.
 * User: wmhamdi
 * Date: 24/01/2019
 * Time: 09:59
 */

namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeliveryController extends AbstractController
{
    /**
     * @Route("/", name = "index")
     */
    public function index()
    {
        return $this->render("index.html.twig");
    }

    /**
     * @Route("/add-delivery",name = "add_delivery")
     */
    public function newDelivery(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($client->getCommandes() as $commande) {
                $commande->setClient($client);
            }
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render("newClient.html.twig", ['form' => $form->createView()]);
    }

}