<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13.01.16
 * Time: 21:58
 */
namespace SmsBundle\Model\Sms\AbstractClasses ;

use SmsBundle\Modules\Sms\SmsSubscriberInterface;

abstract class AbstractSmsSubscriber implements  SmsSubscriberInterface {
    /**
     * @var string - имя абонента
     */
    protected $name ;
    /**
     * @var string телефон абонента
     */
    protected $phone ;
    /**
     * Возвращает имя абонента
     * @return string
     */


    public function getName()
    {
        return $this->name ;
    }

    /**
     * Устанавливаем имя абонента
     * @param $name
     * @return SmsSubscriberInterface
     */
    public function setName($name)
    {
        $this->name = $name ;
        return $this;
    }

    /**
     * Возвращаем телефон абонента
     * @return string
     */
    public function getPhone()
    {
        return $this->phone ;
    }

    /**
     * Устанавливаем телефон абонента
     * @param $phone
     * @return SmsSubscriberInterface
     */
    public function setPhone( $phone )
    {
        $this->phone = $phone;
        return $this;
    }
}