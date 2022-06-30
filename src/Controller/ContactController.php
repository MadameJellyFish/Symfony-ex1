<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ContactController extends AbstractController
{
    #[Route('/contact/create', name: 'contact.create')]
    public function create(): Response
    {
       
        return $this->render('contact/create.html.twig');
    }
    #[Route('/contact', name: 'contact.store', methods:['POST'])]
    public function store(Request $request): Response
    {
    // dd($request->get('nom'));
    $contact= new Contact();//click control+space pour creer une use
    $contact->setNom($request->get('nom'))
            ->setPrenom($request->get('prenom'))
            ->setEmail($request->get('email'))
            ->setMessage($request->get('message'));

     return $this->render('contact/create.html.twig');
    }
}
