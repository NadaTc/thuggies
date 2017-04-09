<?php

namespace Nada\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function MapLibreAction()
    {return $this->render("NadaMapBundle:Default/MapLibre:MapLibre.html.twig") ;}


    public  function  MapQuideAction()
    {           $em = $this->getDoctrine()->getManager();
        $places = $em->getRepository("DataBundle:Places")->findAll();

        return $this->render("NadaMapBundle::BaseGuidee.html.twig",
            array("places" => $places) );}

    public  function  MarkerAction()
    {           $em = $this->getDoctrine()->getManager();
        $places = $em->getRepository("DataBundle:Places")->findAll();

        return $this->render("NadaMapBundle:Default/MapLibre:MapGuidee.html.twig",
            array("places" => $places) );}
}
