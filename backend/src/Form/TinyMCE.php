<?php
// src/Form/Type/TinyMCEType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TinyMCEType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => ['class' => 'tinymce'],
        ]);
    }

    public function getParent(): string
    {
        return TextareaType::class;
    }
}
