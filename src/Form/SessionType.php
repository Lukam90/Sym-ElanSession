<?php

namespace App\Form;

use App\Data\Styles;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


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
            ->add('nbPlaces', TextType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('dateDebut', DateType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('dateFin', DateType::class, [
                "attr" => [
                    "class" => Styles::$inputClass
                ]
            ])
            ->add('Valider', SubmitType::class, [
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
