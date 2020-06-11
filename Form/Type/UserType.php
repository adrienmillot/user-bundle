<?php

declare(strict_types=1);

namespace amillot\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private $className;

    public function __construct(string $prmClassName)
    {
        $this->className = $prmClassName;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, [
                'label' => 'form.label.username',
                'translation_domain' => 'User'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'form.label.password.first',
                    'translation_domain' => 'User',
                ],
                'second_options' => [
                    'label' => 'form.label.password.second',
                    'translation_domain' => 'User',
                ],
            ])
            ->add('profile', ProfileType::class, [
                'label' => false,
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
