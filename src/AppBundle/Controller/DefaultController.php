<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SmsBundle\Modules\Sms\SmsManagerFactory;
use SmsBundle\Modules\Sms\SmsRu\SmsRuManager;
use SmsBundle\Modules\Sms\SmsRu\SmsRuMessage;
use SmsBundle\Modules\Sms\SmsRu\SmsRuSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm( MessageType::class );
        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() )
        {
            $data = $form->getData();
            $phoneValidationRule = new Regex('/((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i');
            $validator = $this->get('validator');
            $phone = $data['To'];
            $validationErrors = $validator->validate($phone, $phoneValidationRule);
            if( count($validationErrors) === 0 ) {
                $smsManagerFactory = $this->get('sms.manager.factory' );
                $apiConfig = $this->getParameter('sms_configs');
                $typeManager = SmsManagerFactory::PROSTOR_RU_MANAGER_TYPE;
                $smsManager = $smsManagerFactory->getSmsManagerClass( $typeManager , $apiConfig );
                $message = $smsManager->getMessage();
                $rep = $message->getRecipient();
                $rep->setPhone($phone);
                $message->setText( $data['Text'] )->setRecipient( $rep );
                $smsManager->setMessage($message)->send();
                return $this->redirectToRoute('sms_form');
            }
        }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'form'=>$form->createView()
        ]);
    }
}
