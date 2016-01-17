<?php

namespace SmsBundle\Tests\Controller;

use SmsBundle\Modules\Sms\SmsRu\SmsRuMessage;
use SmsBundle\Modules\Sms\SmsRu\SmsRuSubscriber;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use SmsBundle\Modules\Sms\SmsManagerFactory;

class DefaultControllerTest extends WebTestCase
{
    public function testSmsRu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $container =  $client->getKernel()->getContainer();
        $smsManagerFactory = $container->get('sms.manager.factory' );
//        $apiConfig = $container->getParameter('smsru_config');
        $apiConfig = $container->getParameter('iqsms_config');
        $typeManager = SmsManagerFactory::IQ_SMS_MANAGER_TYPE;
        $smsManager = $smsManagerFactory->getSmsManagerClass( $typeManager , $apiConfig );
        $rep = new SmsRuSubscriber();
        $rep->setPhone( '79215964925' );
        $sms = new SmsRuMessage();
        $sms->setText( 'aaabbbb' )->setRecipient( $rep );
        $smsManager->setMessage( $sms )->send();

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }

}
