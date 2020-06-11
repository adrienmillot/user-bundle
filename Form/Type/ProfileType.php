<?php

declare(strict_types=1);

namespace amillot\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    private $className;

    public function __construct(string $prmClassName)
    {
        $this->className = $prmClassName;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bornAt', BirthdayType::class, [
                'label' => 'form.label.born_at',
                'translation_domain' => 'Profile',
            ])
            ->add('firstName', null, [
                    'label' => 'form.label.first_name',
                    'translation_domain' => 'Profile',
                ])
            ->add('lastName', null, [
                    'label' => 'form.label.last_name',
                    'translation_domain' => 'Profile',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->className,
        ]);
    }
}
