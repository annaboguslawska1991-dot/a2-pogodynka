<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => ['placeholder' => 'Location name'],
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'France' => 'FR',
                    'Italy' => 'IT',
                    'Spain' => 'ES',
                    'Germany' => 'DE',
                    'Poland' => 'PL',
                    'United States' => 'US',
                    'Australia' => 'AU',
                    'United Kingdom' => 'GB',
                ],
            ])
            ->add('latitude', NumberType::class, [
                'scale' => 7,
                'html5' => true,
                'invalid_message' => 'Nie można odczytać tej wartości jako liczby. Wpisz szerokość geograficzną od -90 do 90 stopni.',
            ])
            ->add('longitude', NumberType::class, [
                'scale' => 7,
                'html5' => true,
                'invalid_message' => 'Nie można odczytać tej wartości jako liczby. Wpisz długość geograficzną od -180 do 180 stopni.',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
