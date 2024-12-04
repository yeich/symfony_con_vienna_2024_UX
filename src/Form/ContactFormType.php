<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $MESSAGE_MAX_LENGTH = 10;

        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new Length(min: 3)
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => 'John Doe'
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email()
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => 'john.doe@example.com'
                ]
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new Length(5)
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => 'Website Bug'
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new Length(min: 5, max: $MESSAGE_MAX_LENGTH)
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => 'I found a bug...',
                    'data-max-length' => $MESSAGE_MAX_LENGTH,
                    'maxlength' => $MESSAGE_MAX_LENGTH,
                    'data-action' => 'input->contact-form#charcounterUpdate',
                    'data-contact-form-target' => 'message'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
