<?php

namespace App\Form;

use App\Classes\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('value', TextType::class, [
                'label' => 'Recherche ',
                'attr' => [
                    'class' => 'pl-3 bg-gray-200 w-full h-10 rounded-l-md',
                    'id' => "searchbar",
                    'placeholder' => $options['placeholder']
                ],
                'constraints' => [
                    new Type('string')
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'placeholder' => ''
        ]);
    }
}
