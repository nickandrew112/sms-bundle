<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:57
 */
namespace SmsBundle\Modules\Sms\AbstractClasses ;


use SmsBundle\Modules\Sms\SmsMessageInterface;
use SmsBundle\Modules\Sms\SmsSubscriberInterface;

abstract class AbstractSmsMessage implements SmsMessageInterface {
    /**
     * @var SmsSubscriberInterface - получатель
     */
    protected $recipient;
    /**
     * @var SmsSubscriberInterface - отправитель
     */
    protected $sender;
    /**
     * @var string - текст
     */
    protected $text;
    /**
     * @var \DateTime - время отправки
     */
    protected $time ;



    public function __construct()
    {
        $this->recipient = null;
        $this->sender = null;
    }

    /**
     * Устанавливаем абонента, которому мы отправляем смс
     * @param SmsSubscriberInterface $recipient
     * @return SmsMessageInterface
     */
    public function setRecipient(SmsSubscriberInterface $recipient)
    {
       $this->recipient = $recipient;
       return $this;
    }

    /**
     * Метод, который вовзращает объект абонента, которому мы отправляем смс
     * @return SmsSubscriberInterface
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Устанавливаем абонента, отправителя
     * @param SmsSubscriberInterface $sender
     * @return SmsMessageInterface
     */
    public function setSender(SmsSubscriberInterface $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Метод, который вовзращает объект отправителя
     * @return SmsSubscriberInterface
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Устанавливаем текст сообщения
     * @param $text
     * @return SmsMessageInterface
     */
    public function setText($text)
    {
        $this->text = $text ;
        return $this;
    }

    /**
     * Возвращаем тект сообщения
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Устанавливаем текст сообщения
     * @param $time
     * @return SmsMessageInterface
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;
        return $this ;
    }

    /**
     * Возвращаем тект сообщения
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    public function toArray()
    {
        $array = array();
        $array['text'] = $this->getText();
        $array['time'] = $this->getTime();
        $sender = $this->getSender();
        if( $sender !== null ) {
            $array['sender'] = $sender->toArray();
        }
        $recipient =  $this->getRecipient();
        if( $recipient !== null ) {
            $array['recipient'] = $recipient->toArray();
        }
        return $array;
    }
}