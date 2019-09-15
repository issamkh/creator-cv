<?php

namespace App\Form;

use App\Entity\ReseauxSociaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReseauxSociauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facebook')
            ->add('youtube')
            ->add('linkedIn')
            ->add('instagrame')
            ->add('twiter')
            ->add('github')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReseauxSociaux::class,
        ]);
    }
}
