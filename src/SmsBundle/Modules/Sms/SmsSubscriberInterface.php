<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 20:41
 */
namespace SmsBundle\Model\Sms;
/**
 * Интерфейс абонента
 * Interface SmsSubscriberInterface
 * @package SmsBundle\Model
 */
interface SmsSubscriberInterface {
    /**
     * Возвращает имя абонента
     * @return string
     */
    public function getName();

    /**
     * Устанавливаем имя абонента
     * @param $name
     * @return SmsSubscriberInterface
     */
    public function setName( $name );

    /**
     * Возвращаем телефон абонента
     * @return string
     */
    public function getPhone();

    /**
     * Устанавливаем телефон абонента
     * @param $phone
     * @return SmsSubscriberInterface
     */
    public function setPhone( $phone );
}