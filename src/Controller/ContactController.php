<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;



class ContactController extends AbstractController
{   
    private ContactRepository $repo;
    public function __construct(ContactRepository $repo)
    {
        $this->repo=$repo;
    }

    #[Route('/contact', name: 'contact.index', methods: ['GET'])]
    public function index()
    {
        $contacts = $this->repo->findAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }


    #[Route('/contact/create', name: 'contact.create', methods:['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        // dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            $this->repo->add($contact, true);
            
            return $this->redirect('/contact');
        }

        return $this->render('contact/create.html.twig', [
            'form' => $form->createView() //view permet de générer la vue du formulaire
        ]);
        // return $this->render('contact/create.html.twig');
    }


    // #[Route('/contact', name: 'contact.store', methods: ['POST'])]
    // public function store(Request $request, EntityManagerInterface $em): Response //injection de depandance d'entity manager
    // {
    //     // dd($request->get('nom'));
    //     $contact = new Contact(); //click control+space pour creer une use
    //     $contact->setNom($request->get('nom'))
    //         ->setPrenom($request->get('prenom'))
    //         ->setEmail($request->get('email'))
    //         ->setMessage($request->get('message'));
    //     //    dd($contact);

    //     $em->persist($contact); //il dit a l'objet de faire un instance de le preparerle objet el le sauvegarder dans la base de donnes de $contact
    //     $em->flush(); //enregistrer
    //     return $this->render('contact/create.html.twig');
    // }


    #[Route('/contact/{id}', name: 'contact.show', methods: ['GET'])]
    public function show($id): Response
    {
        $contact = $this->repo->find($id);
        // dd($contact);
        return $this->render('contact/show.html.twig', [
            'contact' => $contact
        ]);
    }


    #[Route('/contact/{id}', name: 'contact.delete', methods: ['POST'])]
    public function delete($id): Response
    {
        $contact = $this->repo->find($id);
        $this->repo->remove($contact, true);
        return $this->redirect('/contact');
    }

    // modifier le form
    #[Route('/contact/edit/{id}', name: 'contact.edit', methods: ['GET', 'POST'])]
    public function edit($id, Request $request): Response
    {    
        $contact= $this->repo->find($id);
        $form= $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        //    dd($contact);
        
        $this->repo->update();
        return $this->redirect('/contact');
        }


        return $this->render('/contact/edit.html.twig',
        ['form' => $form->createView()]);
    }
        
}

