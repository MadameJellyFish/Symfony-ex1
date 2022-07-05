<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', options:[
                "attr"=>["class"=> "form-control mb-4"],
                "label_attr"=>["class"=> "form-label"],
                'required'=>false//pour dire que c'est ne pas mandatory remplir ces inputs
            ])
            ->add('Prenom', options:[
                "attr"=>["class"=> "form-control  mb-4"],
                "label_attr"=>["class"=> "form-label"],
                'required'=>false
            ])
            ->add('Email', options:[
                "attr"=>["class"=> "form-control  mb-4"],
                "label_attr"=>["class"=> "form-label"],
                'required'=>false
            ])
            ->add('Message', options:[
                "attr"=>["class"=> "form-control  mb-4"],
                "label_attr"=>["class"=> "form-label"],
                'required'=>false
            ])
            ->add('Envoyer', SubmitType::class, [
                "attr"=>["class"=>"btn btn-primary btn-block mb-4"],
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
