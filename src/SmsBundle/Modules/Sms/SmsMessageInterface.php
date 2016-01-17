<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 18:50
 */
namespace SmsBundle\Modules\Sms;
/**
 * Интерфейс смс сообщения
 * Interface SmsMessageInterface
 * @package SmsBundle\Model
 */
interface SmsMessageInterface {
    /**
     * Устанавливаем абонента, которому мы отправляем смс
     * @param SmsSubscriberInterface $recipient
     * @return SmsMessageInterface
     */
    public function setRecipient( SmsSubscriberInterface $recipient  );

    /**
     * Метод, который вовзращает объект абонента, которому мы отправляем смс
     * @return SmsSubscriberInterface
     */
    public function getRecipient();

    /**
     * Устанавливаем абонента, отправителя
     * @param SmsSubscriberInterface $sender
     * @return SmsMessageInterface
     */
    public function setSender( SmsSubscriberInterface $sender  );

    /**
     * Метод, который вовзращает объект отправителя
     * @return SmsSubscriberInterface
     */
    public function getSender();

    /**
     * Устанавливаем текст сообщения
     * @param $text
     * @return SmsMessageInterface
     */
    public function setText( $text );

    /**
     * Возвращаем тект сообщения
     * @return string
     */
    public function getText();

    /**
     * Устанавливаем текст сообщения
     * @param $time
     * @return SmsMessageInterface
     */
    public function setTime( \DateTime $time );

    /**
     * Возвращаем тект сообщения
     * @return \DateTime
     */
    public function getTime();


}