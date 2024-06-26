<?php
// src/Form/ReplyType.php
namespace App\Form;

use App\Entity\Reply;
use App\Entity\Reservation;
use App\Form\Type\TinyMCEType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TinyMCEType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a description for the trip']),
                    new Length([
                        'min' => 15,
                        'minMessage' => 'The description must be at least 15 characters long'
                    ])
                ]
            ])
            ->add('Reservation', EntityType::class, [
                'class' => Reservation::class,
                'label' => 'Choose a reservation:',
                'choice_label' => function ($reservation) {
                    return 'Reply to  ' . $reservation->getFirstName() . ' ' . $reservation->getLastName() . ' on the email : ' . $reservation->getEmail();
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reply::class,
        ]);
    }
}
