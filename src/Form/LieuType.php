<?php

namespace App\Form;

use App\Data\Styles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse', TextType::class, [
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
            'data_class' => Lieu::class,
        ]);
    }
    
}
