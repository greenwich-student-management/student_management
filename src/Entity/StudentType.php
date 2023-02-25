<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

  class StudentType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('fullname')
        ->add('studentcode')
        ->add('created',DataType::class,[
            'widget'=> 'single_text','required'=>false
        ])
        ->add('save',SubmitType::class,[
            'label'=>"Confirm"
        ]);
    }
  }