<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 18.01.16
 * Time: 5:24
 */

namespace SmsBundle\Modules\Sms\ProstorSms;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsMessage;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

class ProstorMessage extends AbstractSmsMessage{

    /**
     * @return SmsSubscriberInterface
     */
    protected function createSubscriber()
    {
        return new ProstorSubscriber();
    }
}