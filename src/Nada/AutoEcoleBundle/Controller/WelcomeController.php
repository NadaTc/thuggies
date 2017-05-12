<?php

namespace Nada\AutoEcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function AgentAction() {return $this->render("NadaAutoEcoleBundle:Welcome:HomeAgent.html.twig");}

    public function UserAction() { return $this->render("NadaAutoEcoleBundle:Welcome:HomeUser.html.twig");}
    public function AccueilAction() { return $this->render("NadaAutoEcoleBundle:Welcome:Home.html.twig");}
    public function ExpertAction() { return $this->render("NadaAutoEcoleBundle:Welcome:ExpertHome.html.twig");}
}
