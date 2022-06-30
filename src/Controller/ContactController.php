<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact.index', methods:['GET'])]
    public function index(ContactRepository $repo)
    {
        $contacts = $repo->findAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }


    #[Route('/contact/create', name: 'contact.create')]
    public function create(): Response
    {

        return $this->render('contact/create.html.twig');
    }


    #[Route('/contact', name: 'contact.store', methods: ['POST'])]
    public function store(Request $request, EntityManagerInterface $em): Response //injection de depandance d'entity manager
    {
        // dd($request->get('nom'));
        $contact = new Contact(); //click control+space pour creer une use
        $contact->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setMessage($request->get('message'));
        //    dd($contact);

        $em->persist($contact); //il dit a l'objet de faire un instance de le preparerle objet el le sauvegarder dans la base de donnes de $contact
        $em->flush(); //enregistrer
        return $this->render('contact/create.html.twig');
    }
}
