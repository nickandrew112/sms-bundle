<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 17.01.16
 * Time: 3:06
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('To', TextType::class)
            ->add('Text', TextareaType::class)
            ->add( 'Submit', SubmitType::class )
            /*->add('Password',  Pass})
            ->add('ConfirmPassword', 'password', array('label' =>'Confirm Password'))
            ->add('Email', 'email')
            ->add('ConfirmEmail', 'email')*/;
    }
}