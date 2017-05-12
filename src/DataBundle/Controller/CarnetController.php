<?php

namespace DataBundle\Controller;

use DataBundle\Entity\Assurance;
use DataBundle\Entity\Reparer;
use DataBundle\Entity\Vidange;
use DataBundle\Entity\Vignette;
use DataBundle\Form\AssuranceType;
use DataBundle\Form\ReparerType;
use DataBundle\Form\VidangeType;
use DataBundle\Form\VignetteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Repository\VidangeRepository;
class CarnetController extends Controller
{
    public function indexAction()
    {
        return $this->render('DataBundle:Carnet_admin:home_admin.html.twig');
    }


    function AfficheAAction($id, Request $request){
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Assurance")->findBy(  array('idVoiture' => $id));

        return $this->render("DataBundle:Default:AfficheA.html.twig",array("voitures"=>$voitures));
    }

    public function AjoutAAction(Request $request) {
        $voiture= new Assurance() ;
        $user = $this->getUser()->getId();
        $Form=$this->createForm(AssuranceType::class, $voiture) ;
        $Form->handleRequest($request);
        $voiture->getIdVoiture($user);
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($voiture) ;
            $em->flush() ;

            return $this->redirectToRoute("User_affiche_voiture") ;
        }
        return $this->render('DataBundle:Default:Ajouter_Assurance.html.twig', array('formu'=>$Form->createView())) ;

    }

    function Affiche_VignetteAction($id, Request $request){
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Vignette")->findBy(  array('idVoiture' => $id),  array ('date' => 'DESC'));






        return $this->render("DataBundle:Default:Affiche_vignette.html.twig",array("voitures"=>$voitures));
    }

    public function Ajout_vignetteAction(Request $request) {
        $voiture= new Vignette() ;
        $user = $this->getUser()->getId();
        $Form=$this->createForm(VignetteType::class, $voiture) ;
        $Form->handleRequest($request);
        $voiture->getIdVoiture($user);
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($voiture) ;
            $em->flush() ;

            return $this->redirectToRoute("User_affiche_voiture") ;
        }
        return $this->render('DataBundle:Default:ajout_vignette.html.twig', array('formu'=>$Form->createView())) ;

    }

    function Affiche_VidangeAction($id, Request $request){
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Vidange")->findBy(  array('idVoiture' => $id),  array ('dateVidange' => 'DESC'));

        return $this->render("DataBundle:Default:Affiche_vidange.html.twig",array("voitures"=>$voitures));
    }


    public function Ajout_vidangeAction(Request $request) {
        $voiture= new Vidange() ;
        $user = $this->getUser()->getId();
        $Form=$this->createForm(VidangeType::class, $voiture) ;
        $Form->handleRequest($request);
        $voiture->getIdVoiture($user);
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($voiture) ;
            $em->flush() ;

            return $this->redirectToRoute("User_affiche_voiture") ;
        }
        return $this->render('DataBundle:Carnet:vidange.html.twig', array('formu'=>$Form->createView())) ;

    }

    public function Ajout_reparationAction(Request $request) {
        $voiture= new Reparer() ;
        $user = $this->getUser()->getId();
        $Form=$this->createForm(ReparerType::class, $voiture) ;
        $Form->handleRequest($request);
        $voiture->getIdVoiture($user);
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($voiture) ;
            $em->flush() ;

            return $this->redirectToRoute("User_affiche_voiture") ;
        }
        return $this->render('DataBundle:Carnet:ajout_reparation.html.twig', array('formu'=>$Form->createView())) ;

    }



    function Affiche_ReparationAction($id, Request $request){
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Reparer")->findBy(  array('idVoiture' => $id));

        return $this->render("DataBundle:Carnet:affiche_reparation.html.twig",array("voitures"=>$voitures));
    }


    function Affiche_admin_vidangeAction(){


        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Vidange")->findAll();

        return $this->render("DataBundle:Carnet_admin:Vidange_admin.html.twig",array("voitures"=>$voitures));
    }


    public function delete_admin_vidangeAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $voiture= $em->getRepository('DataBundle:Vidange')->findOneBy(array('idVidange'=>$id)) ;
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('Admin_gestion_vidange') ;
    }


    public function  update_admin_vidangeAction($id, Request $request) {
        $em=$this->getDoctrine()->getManager() ;
        $voiture=$em->getRepository("DataBundle:Vidange")->find($id);
        $Form=$this->createForm(VidangeType::class, $voiture) ;
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em->persist($voiture) ;
            $em->flush() ;
            return $this->redirectToRoute('Admin_gestion_vidange') ; //thezni lel affiche
        }
        return $this->render('DataBundle:Carnet_admin:modifierV.html.twig',
            array('formM'=>$Form->createView())) ;


    }



    function Affiche_admin_assuranceAction(){


        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Assurance")->findAll();

        return $this->render("DataBundle:Carnet_admin:assurance_admin.html.twig",array("voitures"=>$voitures));
    }

    public function  update_admin_AssuranceAction($id, Request $request) {
        $em=$this->getDoctrine()->getManager() ;
        $voiture=$em->getRepository("DataBundle:Assurance")->find($id);
        $Form=$this->createForm(AssuranceType::class, $voiture) ;
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em->persist($voiture) ;
            $em->flush() ;
            return $this->redirectToRoute('Admin_gestion_assurance') ; //thezni lel affiche
        }
        return $this->render('DataBundle:Carnet_admin:modif_assurance.html.twig',
            array('formM'=>$Form->createView())) ;


    }

    public function delete_admin_assuranceAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $voiture= $em->getRepository('DataBundle:Assurance')->findOneBy(array('idAssurance'=>$id)) ;
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('Admin_gestion_assurance') ;
    }





    function AfficheMaxAction($id){
        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Vidange")->findParametreDQL($id);



       return $this->render("DataBundle:Default:vidange_max.html.twig",array("voitures"=>$voitures));
    }





    public function Ajout_vidange_testAction(Request $request)
    {
        $voiture = new Vidange();
        $user = $this->getUser()->getId();
        $Form = $this->createForm(VidangeType::class, $voiture);
        $Form->handleRequest($request);
        $voiture->getIdVoiture($user);
        $id=$Form->getData()->getIdVoiture();
        $em = $this->getDoctrine()->getManager();
        $m=$em->getRepository("DataBundle:Vidange")->findParametreDQL($id) ;
        if ($Form->isValid()) {

            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute("User_affiche_voiture");
        }
        return $this->render('DataBundle:Carnet:VidangeMax.html.twig', array('formu' => $Form->createView(),'m'=>$m));
    }


}
