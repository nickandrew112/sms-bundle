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

abstract class AbstractSmsManager implements SmsManagerInterface {
    /**
     * @var SmsMessageInterface
     */
    protected $smsMessage ;

    public function __construct(array $config)
    {
        $this->smsMessage = null ;
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

    protected function isMessageValid()
    {
       if(  $this->smsMessage != null )
       {
           if( $this->smsMessage->getText() != null )
           {
               if( $this->smsMessage->getRecipient() != null )
               {
                   return true ;
               }
           }
       }
       return false ;
    }
}