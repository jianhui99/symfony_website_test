<?php

namespace App\Form;

use App\ValueObject\ContactUsForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Validator\Constraints\NotBlank;


class ContactUsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, $this->getFormTypeOptions('Name is required.'))
            ->add('email', TextType::class, $this->getFormTypeOptions('Email is required.'))
            ->add('subject', TextType::class, $this->getFormTypeOptions('Subject is required.'))
            ->add('message', TextareaType::class, $this->getFormTypeOptions('Message is required.'))
            ->add('button', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary',
                    'data-bs-dismiss' => 'modal'
                ],
                'label' => 'Close',
                'row_attr' => [
                    'class' => 'w-25 d-inline-block'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
                'label' => 'Submit',
                'row_attr' => [
                    'class' => 'w-25 d-inline-block'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactUsForm::class,
        ]);
    }

    protected function getFormTypeOptions(string $message): array
    {
        return [
            'row_attr' => [
                'class' => 'mb-3'
            ],
            'label_attr' => [
                'class' => 'col-form-label'
            ],
            'attr' => [
                'class' => 'form-control'
            ],
            'constraints' => [
                new NotBlank([
                    'message' => $message,
                ]),
            ],
        ];
    }
}
