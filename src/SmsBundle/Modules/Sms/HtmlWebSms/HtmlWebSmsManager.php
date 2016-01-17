<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 17.01.16
 * Time: 22:48
 */

namespace SmsBundle\Modules\Sms\HtmlWebSms;

use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsManager;
use SmsBundle\Modules\Sms\SmsManagerInterface;
use SmsBundle\Modules\Sms\SmsMessageInterface;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

class HtmlWebSmsManager extends AbstractSmsManager {

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send()
    {
        // TODO: Implement send() method.
    }

    /**
     * Возвращает новый объект сообщения
     * @return SmsMessageInterface
     */
    public function createMessage()
    {
        return new HtmlWebSmsMessage();
    }

    /**
     * Создает объект абонента
     * @return SmsSubscriberInterface
     */
    public function createSubscriber()
    {
        return new HtmlWebSmsSubscriber();
    }
}