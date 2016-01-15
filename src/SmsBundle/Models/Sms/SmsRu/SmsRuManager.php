<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:53
 */
namespace SmsBundle\Model\Sms\SmsRu ;


use SmsBundle\Model\Sms\AbstractClasses\AbstractSmsManager;
use SmsBundle\Model\Sms\SmsManagerInterface;
use SmsBundle\Model\Sms\SmsSubscriberInterface;

class SmsRuManager extends AbstractSmsManager
{
	/**
	 * @var \Zelenin\SmsRu\Api - объект smsru клиента нужен для отправки sms
	 */
	protected $smsRuClient;


	public function __construct($apiKey)
	{
		$this->smsRuClient = new \Zelenin\SmsRu\Api($apiKey);
	}


	/**
	 * Отправляем сообщение
	 * @return SmsManagerInterface
	 */
	public function send()
	{
        $message = $this->getMessage();
        $sms = new \Zelenin\SmsRu\Entity\Sms( $message->getRecipient()->getPhone(), $message->getText()  );
        $this->smsRuClient->smsSend( $sms );
	}


}