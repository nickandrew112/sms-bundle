<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:53
 */
namespace SmsBundle\Modules\Sms\SmsRu ;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsManager;
use SmsBundle\Modules\Sms\SmsManagerInterface;

class SmsRuManager extends AbstractSmsManager
{
	/**
	 * @var \Zelenin\SmsRu\Api - объект smsru клиента нужен для отправки sms
	 */
	protected $smsRuClient;


	public function __construct(array $config)
	{
        $apiAuth = new \Zelenin\SmsRu\Auth\ApiIdAuth( $config['apiKey'] );
		$this->smsRuClient = new \Zelenin\SmsRu\Api( $apiAuth );
	}


	/**
	 * Отправляем сообщение
	 * @return SmsManagerInterface
	 */
	public function send()
	{
        if( $this->isMessageValid() ) {
            $message = $this->getMessage();
            $phone = $message->getRecipient()->getPhone();
            $sms = new \Zelenin\SmsRu\Entity\Sms($phone, $message->getText());
            $this->smsRuClient->smsSend($sms);
        }
	}


}