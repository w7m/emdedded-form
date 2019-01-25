<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeProduct',ChoiceType::class,[
                'label'=>'Type de Produit',
                'attr'=>[
                    'class'=>'type-product'
                ],
                'choices'=> [
                    'Ordinateur Portable'=>'Ordinateur_Portable',
                    'Ordinateur Bureautique'=>'Ordinateur_Bureautique',
                    'Télephone'=>'Telephone',
                    'Tablette'=>'tablette',
                ]
            ])
            ->add('quantity',TextType::class,[
                'label'=>'Quantité',
                'attr'=>[
                    'class'=>'quantity'
                ]
            ])
            ->add('price',TextType::class,[
                'label'=>'Prix',
                'attr'=>[
                    'class'=>'price'
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
