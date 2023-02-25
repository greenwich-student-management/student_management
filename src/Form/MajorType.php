<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class MajorType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('codemajor')
        ->add('namemajor')
        ->add('save',SubmitType::class,[
            'label'=>"Confirm"
        ]);
    }
}