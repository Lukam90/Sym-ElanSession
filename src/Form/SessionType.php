<?php

namespace App\Form;

use App\Data\Styles;
use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('nbPlaces', NumberType::class, [
                "html5" => true,
                "data" => 1,
                "attr" => [
                    "class" => Styles::$inputClass,
                    "min" => 1,
                    "max" => 100,
                ]
            ])
            ->add('dateDebut', DateType::class, [
                "widget" => "single_text",
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('dateFin', DateType::class, [
                "widget" => "single_text",
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('envoi', SubmitType::class, [
                "label" => "Valider",
                "attr" => [
                    "class" => Styles::$btnClass
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
    
}
