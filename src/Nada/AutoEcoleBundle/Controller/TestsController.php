<?php

namespace Nada\AutoEcoleBundle\Controller;

use DataBundle\Entity\Test;
use Nada\AutoEcoleBundle\Form\AjoutTestType;
use Nada\AutoEcoleBundle\Form\ModifTestType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestsController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    function AfficheTestAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ts = $em->getRepository("DataBundle:Test")->findAll();

        return $this->render("NadaAutoEcoleBundle:Test:ListTest.html.twig",
            array("ts" => $ts)
        );


    }

    public function AjoutTestsAction(Request $request) {
        $ts=new Test() ;
        $Form =$this->createForm(AjoutTestType::class, $ts) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($ts) ;
            $em->flush() ;
            return $this->redirectToRoute("nada_auto_ecole_Test") ;
        }

        return $this->render("NadaAutoEcoleBundle:Test:AjoutTest.html.twig", array('formAjoutTest'=> $Form->createView())) ;

    }


    public function ModifTestAction($id, Request $request)
    {
        $em=$this->getDoctrine()->getManager() ;
        $ts= $em->getRepository("DataBundle:Test")->findOneBy(array('idTest'=>$id)) ;

        $Form =$this->createForm(ModifTestType::class, $ts) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($ts) ;
            $em->flush() ;
            return $this->redirectToRoute("nada_auto_ecole_Test") ; }
        return $this->render('NadaAutoEcoleBundle:Test:ModifTest.html.twig',
            array('formModifTest'=>$Form->createView())) ;

    }


    public function SuppTestAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $ts= $em->getRepository("DataBundle:Test")->findOneBy(array('idTest'=>$id)) ;
        $em->remove($ts);
        $em->flush();

        return $this->redirectToRoute("nada_auto_ecole_Test") ;
    }







}
