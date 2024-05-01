<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Destination;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('departure', null, [
                'widget' => 'single_text'
            ])
            ->add('comingBack', null, [
                'widget' => 'single_text'
            ])
            ->add('description')
            ->add('price')
            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('Destination', EntityType::class, [
                'class' => Destination::class,
                'choice_label' => function ($destination) {
                    return 'To ' . $destination->getCity() . ' city in ' . $destination->getCountry()  ;
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
