<?php

namespace Wissem\CondidatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WissemCondidatBundle:Default:index.html.twig');
    }
}
