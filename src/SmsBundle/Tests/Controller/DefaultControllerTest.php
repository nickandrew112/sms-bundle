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

        $crawler = $client->request('GET', '/test');
        $container =  $client->getKernel()->getContainer();
        $smsManagerFactory = $container->get('sms.manager.factory' );
        $apiKey = $container->getParameter('smsru_config.apiKey');
        $smsManager = $smsManagerFactory->getSmsManagerClass(
            SmsManagerFactory::SMS_RU_MANAGER_TYPE, array(
                'apiKey'=>$apiKey
            )
        );
        $rep = new SmsRuSubscriber();
        $rep->setPhone( '89215964925' );
        $sms = new SmsRuMessage();
        $sms->setText( 'aaa' )->setRecipient( $rep );
        $smsManager->setMessage( $sms )->send();

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
