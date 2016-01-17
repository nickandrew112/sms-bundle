<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 18.01.16
 * Time: 5:24
 */

namespace SmsBundle\Modules\Sms\ProstorSms;


use SmsBundle\Modules\Sms\AbstractClasses\AbstractSmsManager;
use SmsBundle\Modules\Sms\SmsManagerInterface;
use SmsBundle\Modules\Sms\SmsMessageInterface;

class ProstorManager extends AbstractSmsManager {
    /**
     * @var string - логин для доступа к апи
     */
    protected $apiLogin;
    /**
     * @var string - пароль для доступа к апи
     */
    protected $apiPassword;

    public function __construct(array $config)
    {
        parent::__construct( $config );
        $this->apiLogin = $config['apiLogin'];
        $this->apiPassword = $config['apiPassword'] ;
    }

    /**
     * @return SmsMessageInterface
     */
    protected function createMessage()
    {
        return new ProstorMessage();
    }

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send()
    {
        if( $this->isMessageValid() )
        {
            $requestParamArray = array(
                'phone'=>$this->smsMessage->getRecipient()->getName(),
                'text'=>$this->smsMessage->getText(),
                'login'=>$this->apiLogin,
                'password'=>$this->apiPassword

            );
            $ch = curl_init();
            $requestUrl = "http://gate.prostor-sms.ru/send/?" . http_build_query( $requestParamArray );
            $ret = curl_setopt($ch, CURLOPT_URL, $requestUrl );
            $ret = curl_setopt($ch, CURLOPT_HEADER,         1);
            $ret = curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $ret = curl_setopt($ch, CURLOPT_TIMEOUT,        30);
            $ret = curl_exec($ch);
        }
    }
}