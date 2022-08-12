<?php

namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => "Prénom : ",
            ])
            ->add('nom', TextType::class, [
                'label' => "Nom : ",
            ])
            ->add('telephone', TextType::class, [
                'label' => "Téléphone : ",
            ])
            ->add('email', EmailType::class, [
                'label' => "E-mail : ",
                ])
            ->add('adresse', TextType::class, [
                'label' => "Adresse : ",
                ])
            ->add('poste', TextType::class, [
                'label' => "Poste : ",
                ])
            ->add('salaire', TextType::class, [
                'label' => "Salaire : ",
                ])
            ->add('datedenaissance', DateType::class, [
                'label' => "Date de naissance : ",
                'format' => 'dd MM yyyy',
                'years' => range(date('1950'), date('Y')-14),
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
