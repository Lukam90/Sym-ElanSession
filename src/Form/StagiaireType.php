<?php

namespace App\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Notifier\Texter;
use Symfony\Component\OptionsResolver\OptionsResolver;


class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [])
            ->add('prenom', TextType::class, [])
            ->add('email', EmailType::class, [])
            ->add('adresse', TextType::class, [])
            ->add('cp', TextType::class, [])
            ->add('ville', TextType::class, [])
            ->add('telephone', NumberType::class, [])
            ->add('nPoleEmploi', TextType::class, [])
            ->add('Valider', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
    
}
