<?php

namespace DataBundle\Controller;

use DataBundle\Entity\Voiture;
use DataBundle\Form\VoitureRechForm;
use DataBundle\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VoitureController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    function AfficheVAction(){


        $em=$this->getDoctrine()->getManager();
        $voitures=$em->getRepository("DataBundle:Voiture")->findAll();

        return $this->render("DataBundle:Default:AfficheV.html.twig",array("voitures"=>$voitures));
    }


    public function AjoutVAction(Request $request) {
        $user = $this->getUser()->getId();
        $voiture= new Voiture() ;
        $Form=$this->createForm(VoitureType::class, $voiture) ;
        $Form->handleRequest($request);

        if($Form->isValid()) {
            $voiture->setIdUser($user);
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($voiture) ;
            $em->flush() ;

            return $this->redirectToRoute("User_affiche_voiture") ;
        }
        return $this->render('DataBundle:Default:AjoutV.html.twig', array('formu'=>$Form->createView())) ;

    }

    public function deleteVAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $voiture= $em->getRepository('DataBundle:Voiture')->findOneBy(array('idVoiture'=>$id)) ;
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('User_affiche_voiture') ;
    }


    public function  updateVAction($id, Request $request) {
        $em=$this->getDoctrine()->getManager() ;
        $voiture=$em->getRepository("DataBundle:Voiture")->find($id);
        $Form=$this->createForm(VoitureType::class, $voiture) ;
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em->persist($voiture) ;
            $em->flush() ;
            return $this->redirectToRoute('User_affiche_voiture') ; //thezni lel affiche
        }
        return $this->render('DataBundle:Default:modifierV.html.twig',
            array('formM'=>$Form->createView())) ;


    }


    public function RechSerieDQLAction( Request $request)
    {
        $voiture= new Voiture() ;
        $em=$this->getDoctrine()->getManager() ;
        $voitures=$em->getRepository("DataBundle:Voiture")->findAll();
        $Form=$this->createForm(VoitureRechForm::class, $voiture) ;
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $serie=$voiture->getImmatricule() ;
            $voitures=$em->getRepository('DataBundle:Voiture')->findSerieDQL($serie);


        }
        return $this->render('DataBundle:Carnet_admin:home_admin.html.twig', array('formRech'=>$Form->createView(), 'voitures' =>$voitures)) ;

    }



}
