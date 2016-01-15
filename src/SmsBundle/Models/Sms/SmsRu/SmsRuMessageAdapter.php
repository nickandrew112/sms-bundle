<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:53
 */
namespace SmsBundle\Model\Sms\SmsRu ;

use SmsBundle\Model\Sms\AbstractClasses\AbstractSmsMessage;
use SmsBundle\Model\Sms\SmsSubscriberInterface;

class SmsRuMessageAdapter extends AbstractSmsMessage {
	/**
	 * @var \Zelenin\SmsRu\Entity\Sms
	 */
	protected $smsRuObject;

	/**
	 * Устанавливаем текст сообщения
	 * @param $text
	 * @return SmsMessageInterface
	 */
	public function setText($text)
	{

	}

	/**
	 * Устанавливаем текст сообщения
	 * @param $time
	 * @return SmsMessageInterface
	 */
	public function setTime( \DateTime $time )
	{

	}

	/**
	 * Устанавливаем абонента, которому мы отправляем смс
	 * @param SmsSubscriberInterface $recipient
	 * @return SmsMessageInterface
	 */
	public function setRecipient(SmsSubscriberInterface $recipient)
	{

	}

	/**
	 * Устанавливаем абонента, отправителя
	 * @param SmsSubscriberInterface $sender
	 * @return SmsMessageInterface
	 */
	public function setSender(SmsSubscriberInterface $sender)
	{

	}
}