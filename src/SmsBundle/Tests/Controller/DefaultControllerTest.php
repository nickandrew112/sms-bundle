<?php

namespace SmsBundle\Tests\Controller;

use SmsBundle\Modules\Sms\SmsManagerInterface;
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
        $apiConfig = $container->getParameter('sms_configs');
        $typeManager = SmsManagerFactory::SMS_RU_MANAGER_TYPE;
        /**
         * @var SmsManagerInterface  $smsManager
         */
        $smsManager = $smsManagerFactory->getSmsManagerClass( $typeManager , $apiConfig );
        $rep = $smsManager->createSubscriber();
        $rep->setPhone( '79218648104' );
        $sms = $smsManager->createMessage();
        $sms->setText( 'aaabbbb' )->setRecipient( $rep );
        $smsManager->setMessage( $sms )->send();

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }

}
