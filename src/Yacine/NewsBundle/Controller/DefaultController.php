<?php

namespace Yacine\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YacineNewsBundle:Default:index.html.twig');
    }
}
