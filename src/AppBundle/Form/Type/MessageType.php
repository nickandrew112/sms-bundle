<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 17.01.16
 * Time: 3:06
 */

namespace AppBundle\Form\Type;


use SmsBundle\Modules\Sms\IqSms\IqSmsManager;
use SmsBundle\Modules\Sms\SmsManagerFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('SmsServiceType', ChoiceType::class, array(
                'choices'=>array(
                    'sms.ru'=>SmsManagerFactory::SMS_RU_MANAGER_TYPE,
                    'iqsms'=>SmsManagerFactory::IQ_SMS_MANAGER_TYPE,
                    'prostor.sms'=>SmsManagerFactory::PROSTOR_RU_MANAGER_TYPE
                )
            ))
            ->add( 'Submit', SubmitType::class )
            /*->add('Password',  Pass})
            ->add('ConfirmPassword', 'password', array('label' =>'Confirm Password'))
            ->add('Email', 'email')
            ->add('ConfirmEmail', 'email')*/;
    }
}