<?php

namespace SmsBundle\Controller;

use SmsBundle\Modules\Sms\SmsManagerFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SmsBundle:Default:index.html.twig');
    }
}
