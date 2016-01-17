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
        $typeManager = SmsManagerFactory::PROSTOR_RU_MANAGER_TYPE;
        /**
         * @var SmsManagerInterface  $smsManager
         */
        $smsManager = $smsManagerFactory->getSmsManagerClass( $typeManager , $apiConfig );
        $message = $smsManager->getMessage();
        $rep = $message->getRecipient();
        $rep->setPhone( '79218648104' );
        $message->setText( 'aaabbbb' )->setRecipient( $rep );
        $smsManager->setMessage( $message )->send();

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }

}
