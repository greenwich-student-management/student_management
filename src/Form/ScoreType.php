<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

  class ScoreType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('score')
        ->add('student')
        ->add('subject')
        // ->add('file', FileType::class, [
        //   'label'=>"Student Image",
        //   'required'=>false,
        //   'mapped'=>false
        // ])
        // ->add('image', HiddenType::class, [
        //   'required'=>false
        // ])
        ->add('save',SubmitType::class,[
            'label'=>"Confirm"
        ]);
    }
  }