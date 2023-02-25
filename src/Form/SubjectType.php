<?php


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SubjectType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('subjectname')
        ->add('subjectcode')
        ->add('save',SubmitType::class,[
            'label'=>"Confirm"
        ]);
    }
}