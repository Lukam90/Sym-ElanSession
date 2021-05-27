<?php

namespace App\Form;

use App\Data\Styles;
use App\Entity\Stagiaire;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Texter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class StagiaireType extends AbstractType
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
            ->add('adresse', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('cp', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('ville', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('telephone', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('nPoleEmploi', TextType::class, [
                "required" => false,
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('envoi', SubmitType::class, [
                "attr" => [
                    "class" => Styles::$btnClass
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
    
}
