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
    public function __construct(array $config)
    {
        parent::__construct($config);
        $sender = $this->createSubscriber()->setPhone( $config['from'] );
        $this->smsMessage->setSender($sender);
    }

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send()
    {
        if( $this->isMessageValid() ) {

        }
    }

    /**
     * Возвращает новый объект сообщения
     * @return SmsMessageInterface
     */
    protected function createMessage()
    {
        return new HtmlWebSmsMessage();
    }

    /**
     * Создает объект абонента
     * @return SmsSubscriberInterface
     */
    protected function createSubscriber()
    {
        return new HtmlWebSmsSubscriber();
    }
}