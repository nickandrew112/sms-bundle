<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 15.01.16
 * Time: 23:52
 */

namespace SmsBundle\Modules\Sms;


use SmsBundle\Modules\Sms\IqSms\IqSmsManager;
use SmsBundle\Modules\Sms\SmsRu\SmsRuManager;

class SmsManagerFactory {

    /**
     * Типы sms менеджеров
     */
    /**
     * @const SMS_RU_MANAGER_TYPE - менеджер для сайта sms.ru( SmsBundle\Modules\Sms\SmsRu\SmsRuManager )
     */
    const SMS_RU_MANAGER_TYPE = 1;
    /**
     * @const SMS_RU_MANAGER_TYPE - менеджер для сайта iqsms.ru( \iqsms_json )
     */
    const IQ_SMS_MANAGER_TYPE = 2;

    /**
     * Возвращает sms менеджер в зависимости от type
     * Все значения type есть в данном классе в именнованных константах
     * @param int $type
     * @param array $config - массив, содержащий конфигурцию данного sms сервиса
     * @return SmsManagerInterface
     */
    public function getSmsManagerClass( $type, array $config )
    {
        switch( $type )
        {
            case self::IQ_SMS_MANAGER_TYPE:
                return new IqSmsManager( $config );
                break;
            case self::SMS_RU_MANAGER_TYPE:
            default:
                return new SmsRuManager( $config );
            break;
        }
    }
}