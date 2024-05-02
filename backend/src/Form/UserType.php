<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter your first name'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your first name']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your first name must be at least {{ limit }} characters long'
                    ])
                ]
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter your last name'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your last name']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your last name must be at least {{ limit }} characters long'
                    ])
                ]
            ])
            ->add('telephone', TelType::class, [
                'attr' => [
                    'placeholder' => 'Enter your telephone number'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your telephone number']),
                    new Regex([
                        'pattern' => '/^\+?\d{6,}$/',
                        'message' => 'Please enter a valid telephone number'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Enter your email address'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your email address'])
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Enter your password'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a password']),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Your password must be at least {{ limit }} characters long'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
