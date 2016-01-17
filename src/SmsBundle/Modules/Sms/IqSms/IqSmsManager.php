<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 17.01.16
 * Time: 5:23
 */

namespace SmsBundle\Modules\Sms\IqSms;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsManager;
use SmsBundle\Modules\Sms\SmsManagerInterface;

class IqSmsManager extends AbstractSmsManager{
    const DEFAULT_QUEUE_NAME = 'testQueue';
    /**
     * @var \iqsms_json
     */
    protected $iqSmsObject ;
    /**
     * @var string $queueName - имя очереди, используется для отслеживания
     * смс в данном сервисе
     */
    protected $queueName ;

    public function __construct(array $config)
    {
        parent::__construct( $config );
        $this->iqSmsObject = new \iqsms_json( $config['apiLogin'], $config['apiPassword'] );
        if( isset( $config['queueName'] ) )
        {
            $this->queueName =  $config['queueName'];
        }
        else
        {
            $this->queueName = self::DEFAULT_QUEUE_NAME;
        }
    }

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send()
    {
        if( $this->isMessageValid() ) {
            $messageArray = array(
                'phone' => $this->smsMessage->getRecipient()->getPhone(),
                'text' => $this->smsMessage->getText()
            );
            $this->iqSmsObject->send($messageArray, $this->queueName);
        }
    }
}