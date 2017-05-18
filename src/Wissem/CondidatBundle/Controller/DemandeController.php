<?php

namespace Wissem\CondidatBundle\Controller;

use DataBundle\Entity\Demande;
use DataBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Wissem\CondidatBundle\Form\AjoutDemandeType;

class DemandeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }



    function AffichedemandeAction()
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $username = $user->getUsername();



        }
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DataBundle:Demande")->findAll();

        return $this->render("WissemCondidatBundle:Demande:demande.html.twig",
            array('user'=>$username,"demande" => $demande)
        );


    }

    public  function GestDemandeAction() {
        return $this->render("@WissemCondidat/accept/gestDemandeUser.html.twig") ;
    }

    public function SuppDemandeAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $dema= $em->getRepository("DataBundle:Demande")->findOneBy(array('idDemande'=>$id)) ;
        $em->remove($dema);
        $em->flush();

        return $this->redirectToRoute("wissem_condidat_list_demande") ;
    }

    public function AjoutDemandeAction(Request $request) {

        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();


        }

        $demande=new Demande() ;
  $demande->setIdDemande($user);
        $demande->setEtat("Non traité");




        $Form =$this->createForm(AjoutDemandeType::class, $demande) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($demande) ;
            $em->flush() ;
           return $this->redirectToRoute("wissem_condidat_gestUserDemande") ;
        }

        return $this->render("@WissemCondidat/Demande/Ajoutdemande.html.twig", array('formAjoutdemande'=> $Form->createView())) ;

    }



    public function ModifDemandeAction($id, Request $request)
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
