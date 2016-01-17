<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:58
 */
namespace SmsBundle\Modules\Sms\AbstractClasses ;

use SmsBundle\Modules\Sms\SmsManagerInterface;
use SmsBundle\Modules\Sms\SmsMessageInterface;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

abstract class AbstractSmsManager implements SmsManagerInterface {
    /**
     * @var SmsMessageInterface
     */
    protected $smsMessage ;

    public function __construct(array $config)
    {
        $this->smsMessage = $this->createMessage() ;
        if( isset( $config['phone'] ) && isset( $config['name'] ) )
        {
            $sender = $this->smsMessage->getSender();
            $sender->setName( $config['name'] );
            $sender->setPhone( $config['phone'] );
            $this->smsMessage->setSender($sender);
        }
    }

    /**
     * Устанавливаем объект смс сообщения
     * @param SmsMessageInterface $sms
     * @return SmsManagerInterface
     */
    public function setMessage( SmsMessageInterface $sms )
    {
        $this->smsMessage = $sms;
        return $this;
    }

    /**
     * Возвращаем объект смс сообщения
     * @return SmsMessageInterface
     */
    public function getMessage()
    {
        return $this->smsMessage;
    }

    /**
     * Метод, проверяющий можно ли отправлять сообщение
     * @return bool
     */
    protected function isMessageValid()
    {
       if( $this->smsMessage->getText() != null )
       {
             return true ;
       }

       return false ;
    }

    /**
     * @return SmsMessageInterface
     */
    abstract protected function createMessage();

}