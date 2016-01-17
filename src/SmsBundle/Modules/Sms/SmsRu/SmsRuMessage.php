<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:53
 */
namespace SmsBundle\Modules\Sms\SmsRu ;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsMessage;
use SmsBundle\Modules\Sms\IqSms\IqSmsSubscriber;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

class SmsRuMessage extends AbstractSmsMessage {

    /**
     * @return SmsSubscriberInterface
     */
    protected function createSubscriber()
    {
        return new IqSmsSubscriber();
    }
}