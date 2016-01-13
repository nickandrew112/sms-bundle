<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 20:51
 */

namespace SmsBundle\Model\Sms;

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
     * Возвращаем объект смс сообщения
     * @return SmsMessageInterface
     */
    public function getMessage();

    /**
     * Отправляем сообщение
     * @return SmsManagerInterface
     */
    public function send();
}