<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('telephone')
            ->add('email')
            ->add('trip', EntityType::class, [
                'class' => Trip::class,
'choice_label' => 'id',
            ])
            ->add('Status', EntityType::class, [
                'class' => Status::class,
'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
