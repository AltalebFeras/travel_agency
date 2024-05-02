<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Destination;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\DateTime;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a name for the trip']),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'The name must be at least five characters long'
                    ])
                ]
            ])
            ->add('departure', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new DateTime(['format' => 'Y-m-d H:i:s'])
                ]
            ])
            ->add('comingBack', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new DateTime(['format' => 'Y-m-d H:i:s'])
                ]
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a description for the trip']),
                    new Length([
                        'min' => 15,
                        'minMessage' => 'The description must be at least 15 characters long'
                    ])
                ]
            ])
            ->add('price', MoneyType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a price for the trip']),
                    new Positive(['message' => 'The price must be a positive number'])
                ]
            ])
            
            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                
            ])
            
            ->add('Destination', EntityType::class, [
                'class' => Destination::class,
                'choice_label' => function ($destination) {
                    return 'To ' . $destination->getCity() . ' city in ' . $destination->getCountry();
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
