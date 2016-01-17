<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 15.01.16
 * Time: 23:52
 */

namespace SmsBundle\Modules\Sms;


use SmsBundle\Modules\Sms\IqSms\IqSmsManager;
use SmsBundle\Modules\Sms\ProstorSms\ProstorManager;
use SmsBundle\Modules\Sms\SmsRu\SmsRuManager;

class SmsManagerFactory {

    /**
     * Типы sms менеджеров
     */
    /**
     * @const SMS_RU_MANAGER_TYPE - менеджер для сайта sms.ru
     */
    const SMS_RU_MANAGER_TYPE = 1;
    /**
     * @const IQ_SMS_MANAGER_TYPE - менеджер для сайта iqsms.ru
     */
    const IQ_SMS_MANAGER_TYPE = 2;
    /**
     * @const PROSTOR_RU_MANAGER_TYPE  - менеджер для сайта prostor-sms.ru
     */
    const PROSTOR_RU_MANAGER_TYPE = 3;

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
                return new IqSmsManager( $config['iqsms_config'] );
                break;
            case self::PROSTOR_RU_MANAGER_TYPE:
                return new ProstorManager( $config['prostor_config'] );
                break;
            case self::SMS_RU_MANAGER_TYPE:
            default:
                return new SmsRuManager( $config['smsru_config'] );
            break;
        }
    }
}