<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/create', name: 'contact.create')]
    public function create(): Response
    {
        $data=[
            "nom"=>'',
            "prenom"=>'',
            "email"=>'',
            "message"=>'',
        ];
        return $this->render('contact/create.html.twig', [
            'data' => $data,
        ]);
    }
   
}
