<?php

namespace Farah\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FarahChatBundle:Default:index.html.twig');
    }
}
