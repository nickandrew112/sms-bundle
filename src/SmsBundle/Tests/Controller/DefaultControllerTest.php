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

        $smsManagerFactory =  $myParams = $client->getKernel()->getContainer()->get('sms.manager.factory' );
        $smsManager = $smsManagerFactory->getSmsManagerClass(
            SmsManagerFactory::SMS_RU_MANAGER_TYPE, array(
                'apiKey'=>'8841450e-65d8-e0f4-55a2-b4879dfdbb1c'
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
