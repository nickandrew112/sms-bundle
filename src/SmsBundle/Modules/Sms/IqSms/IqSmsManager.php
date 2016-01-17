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
    /**
     * @var \iqsms_json
     */
    protected $iqSmsObject ;

    public function __construct(array $config)
    {
        parent::__construct( $config );
        $this->iqSmsObject = new \iqsms_json( $config['apiLogin'], $config['apiPassword'] );
        // TODO: Implement __construct() method.
    }

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send()
    {
        $messageArray = $this->getMessage()->toArray();
        $this->iqSmsObject->send( $messageArray );
    }
}