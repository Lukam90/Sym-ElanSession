<?php

namespace App\Form;

use App\Data\Styles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class, [
            "attr" => [
                "class" => Styles::$inputClass
            ]
        ])
        ->add('prenom', TextType::class, [
            "attr" => [
                "class" => Styles::$inputClass
            ]
        ])
        ->add('email', EmailType::class, [
            "attr" => [
                "class" => Styles::$inputClass
            ]
        ])
        ->add('password', TextType::class, [
            "attr" => [
                "class" => Styles::$inputClass
            ]
        ])
        ->add('role', TextType::class, [
            "attr" => [
                "class" => Styles::$inputClass
            ]
        ])
        ->add('Valider', SubmitType::class, [
            "attr"  => [
                "class" => Styles::$btnClass
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
    
}
