<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 20:51
 */

namespace SmsBundle\Model;

/**
 * Интерфейс для менеджера
 * Interface SmsManagerInterface
 * @package SmsBundle\Model
 */
interface SmsManagerInterface {
    /**
     * Устанавливаем объект смс сообщения
     * @param SmsMessageInterface $sms
     * @return SmsManagerInterface
     */
    public function setMessage( SmsMessageInterface $sms );

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send();
}