<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('admin_panel', CheckboxType::class, [
                'label' => 'Créer un accès de suivie de projet ',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'sr-only'
                ],
                'constraints' => [
                    new Type('boolean')
                ]
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom Prénom',
                'constraints' => [
                    new Type('string'),
                    new NotBlank()
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Entreprise',
                'required' => false,
                'constraints' => [
                    new Type('string')
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Portable',
                'constraints' => [
                    new Type('string'),
                    new Regex('/^(0)[\d\s]{9,13}$/'),
                    new NotBlank()
                ]
            ])
            ->add('phone2', TextType::class, [
                'label' => 'Téléphone',
                'required'=> false,
                'constraints' => [
                    new Type('string'),
                    new Regex('/^(0)[\d\s]{9,13}$/')
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new Type('string'),
                    new Email(),
                    new NotBlank()
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'constraints' => [
                    new Type('string'),
                    new NotBlank()
                ]
            ])
            ->add('zip_code', TextType::class, [
                'label' => 'Code postal',
                'constraints' => [
                    new Type('string'),
                    new Regex('/[\d]{5}/'),
                    new NotBlank(),
                    new Length('5')
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'constraints' => [
                    new Type('string'),
                    new NotBlank()
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'data' => 'FR',
                'constraints' => [
                    new Type('string'),
                    new NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'float-right bg-green-400 px-6 py-1 text-white rounded-md text-xl mt-5'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
