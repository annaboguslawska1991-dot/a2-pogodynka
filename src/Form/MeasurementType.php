<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'invalid_message' => 'Podaj poprawną datę pomiaru.',
            ])
            ->add('celsius', NumberType::class, [
                'scale' => 0,
                'html5' => true,
                'input' => 'string',
                'invalid_message' => 'Nie można odczytać temperatury. Podaj liczbę w stopniach Celsjusza.',
            ])
            ->add('humidity', IntegerType::class, [
                'invalid_message' => 'Nie można odczytać wilgotności. Podaj liczbę całkowitą od 0 do 100.',
            ])
            ->add('pressure', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'input' => 'string',
                'invalid_message' => 'Nie można odczytać ciśnienia. Podaj liczbę, np. 1013.25.',
            ])
            ->add('precipitation', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'input' => 'string',
                'invalid_message' => 'Nie można odczytać opadu. Podaj liczbę, np. 2.50.',
            ])
            ->add('windDirection', IntegerType::class, [
                'invalid_message' => 'Nie można odczytać kierunku wiatru. Podaj liczbę całkowitą od 0 do 360.',
            ])
            ->add('windSpeed', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'input' => 'string',
                'invalid_message' => 'Nie można odczytać prędkości wiatru. Podaj liczbę, np. 3.50.',
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'name',
                'placeholder' => 'Wybierz lokalizację',
                'invalid_message' => 'Wybierz lokalizację dostępną na liście.',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
