<?php

namespace App\Form;

use App\Entity\Destination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Length;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('country', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Country cannot be blank.']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Country must be at least {{ limit }} characters long.',
                    ]),
                ]
            ])
            ->add('city', null, [
                'constraints' => [
                    new NotBlank(['message' => 'City cannot be blank.']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'City must be at least {{ limit }} characters long.',
                    ]),
                ]
            ])
            ->add('image', null, [
                'constraints' => [
                    new Url(['message' => 'Invalid URL format. Please enter a valid URL.'])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Destination::class,
        ]);
    }
}
