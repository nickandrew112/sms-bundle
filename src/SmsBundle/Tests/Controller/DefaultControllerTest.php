<?php

namespace SmsBundle\Tests\Controller;

use SmsBundle\Modules\Sms\SmsRu\SmsRuMessage;
use SmsBundle\Modules\Sms\SmsRu\SmsRuSubscriber;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use SmsBundle\Modules\Sms\SmsManagerFactory;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $container =  $client->getKernel()->getContainer();
        $smsManagerFactory = $container->get('sms.manager.factory' );
        $apiConfig = $container->getParameter('smsru_config');
        $smsManager = $smsManagerFactory->getSmsManagerClass(
            SmsManagerFactory::SMS_RU_MANAGER_TYPE, $apiConfig
        );
        $rep = new SmsRuSubscriber();
        $rep->setPhone( '89215964925' );
        $sms = new SmsRuMessage();
        $sms->setText( 'aaa' )->setRecipient( $rep );
        $smsManager->setMessage( $sms )->send();

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
