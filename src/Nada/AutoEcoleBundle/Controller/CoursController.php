<?php

namespace Nada\AutoEcoleBundle\Controller;

use DataBundle\Entity\CoursCode;
use Nada\AutoEcoleBundle\Form\AjoutCoursType;
use Nada\AutoEcoleBundle\Form\ModifCoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class CoursController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }



    function AfficheCoursAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cours = $em->getRepository("DataBundle:CoursCode")->findAll();

        return $this->render("NadaAutoEcoleBundle:Cours:ListCours.html.twig",
            array("cours" => $cours)
            );


    }


    public function SuppCoursAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $cours= $em->getRepository("DataBundle:CoursCode")->findOneBy(array('idCours'=>$id)) ;
        $em->remove($cours);
        $em->flush();

        return $this->redirectToRoute("nada_auto_ecole_Cours") ;
    }

      public function AjoutCoursAction(Request $request) {
        $cours=new CoursCode() ;
        $Form =$this->createForm(AjoutCoursType::class, $cours) ;
          $Form->handleRequest($request) ;
          if($Form->isValid()) {
              $em=$this->getDoctrine()->getManager() ;
              $em->persist($cours) ;
              $em->flush() ;
              return $this->redirectToRoute("nada_auto_ecole_Cours") ;
      }

        return $this->render("NadaAutoEcoleBundle:Cours:AjoutCours.html.twig", array('formAjoutCours'=> $Form->createView())) ;

      }



  public function ModifCoursAction($id, Request $request)
  {
      $em=$this->getDoctrine()->getManager() ;
      $coursM= $em->getRepository("DataBundle:CoursCode")->findOneBy(array('idCours'=>$id)) ;

      $Form =$this->createForm(ModifCoursType::class, $coursM) ;
      $Form->handleRequest($request) ;
      if($Form->isValid()) {
          $em=$this->getDoctrine()->getManager() ;
          $em->persist($coursM) ;
          $em->flush() ;
          return $this->redirectToRoute("nada_auto_ecole_Cours") ; }
      return $this->render('NadaAutoEcoleBundle:Cours:Modif.html.twig',
          array('formModifCours'=>$Form->createView())) ;

  }





    }
