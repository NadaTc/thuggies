<?php

namespace Nada\AutoEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NadaAutoEcoleBundle:Default:index.html.twig');
    }
}
