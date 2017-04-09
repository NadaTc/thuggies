<?php

namespace Nada\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NadaMapBundle:Default:index.html.twig');
    }
}
