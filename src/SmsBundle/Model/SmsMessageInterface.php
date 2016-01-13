<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 18:50
 */
namespace SmsBundle\Model;
/**
 * Интерфейс смс сообщения
 * Interface SmsMessageInterface
 * @package SmsBundle\Model
 */
interface SmsMessageInterface {
    /**
     * Устанавливаем абонента, которому мы отправляем смс
     * @param SmsSubscriberInterface $recipient
     * @return mixed
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
     * @return mixed
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
     * @return SmsSubscriberInterface
     */
    public function setText( $text );

    /**
     * Возвращаем тект сообщения
     * @return string
     */
    public function getText();

    /**
     * Устанавливаем текст сообщения
     * @param $date
     * @return SmsSubscriberInterface
     */
    public function setTime( \DateTime $date );

    /**
     * Возвращаем тект сообщения
     * @return \DateTime
     */
    public function getTime();

}