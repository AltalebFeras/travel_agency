<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Country cannot be blank.']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Country must be at least {{ limit }} characters long.',
                    ]),
                ]
            ])
            ->add('description', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Country cannot be blank.']),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Country must be at least {{ limit }} characters long.',
                    ]),
                ]
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
