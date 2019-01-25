<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'Nom',
                'attr'=>[
                    'class'=>'name-client'
                ]
            ])
            ->add('username',TextType::class,[
                'label'=>'Pseudo',
                'attr'=>[
                    'class'=>'username-client'
                ]
            ])
            ->add('email',EmailType::class,[
                'label'=>'Courriel',
                'attr'=>[
                    'class'=>'email-client'
                ]
            ])
            ->add('registrationNumber',TextType::class,[
                'label'=>'Matricule',
                'attr'=>[
                    'class'=>'registry-number-client'
                ]
            ])
            ->add('commandes',CollectionType::class,[
                'entry_type'=>CommandeType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'label'=>'Liste des Commandes'
            ])
            ->add('Ajouter',SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
