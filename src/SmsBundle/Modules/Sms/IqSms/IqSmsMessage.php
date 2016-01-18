<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 17.01.16
 * Time: 5:23
 */

namespace SmsBundle\Modules\Sms\IqSms;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsMessage;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

/**
 * Class IqSmsMessage - класс-сообщение для сервиса iqsms.ru
 * @package SmsBundle\Modules\Sms\IqSms
 */
class IqSmsMessage extends AbstractSmsMessage {

    /**
     * @return SmsSubscriberInterface
     */
    protected function createSubscriber()
    {
        return new IqSmsSubscriber();
    }
}