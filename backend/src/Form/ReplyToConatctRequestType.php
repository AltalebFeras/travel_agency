<?php

namespace App\Form;

use App\Entity\ReplyToConatctRequest;
use App\Entity\Contact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReplyToConatctRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a description for the trip']),
                    new Length([
                        'min' => 15,
                        'minMessage' => 'The description must be at least 15 characters long'
                    ])
                ]
            ])
          
            ->add('Contact', EntityType::class, [
                'class' => Contact::class,
                'label' => 'Choose a contact request:',
                'choice_label' => function ($contact) {
                    return 'Reply to  ' . $contact->getFirstName() . ' ' . $contact->getLastName() . ' on the email : ' . $contact->getEmail();
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReplyToConatctRequest::class,
        ]);
    }
}
