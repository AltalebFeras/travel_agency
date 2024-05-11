<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
            ])
            ->add('firstName', null, ['disabled' => true])
            ->add('lastName', null, ['disabled' => true])
            ->add('telephone', null, ['disabled' => true])
            ->add('email', null, ['disabled' => true])
            ->add('trip', EntityType::class, [
                'class' => Trip::class,
                'choice_label' => 'name',
                'disabled' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
