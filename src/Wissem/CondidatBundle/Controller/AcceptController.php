<?php

namespace Wissem\CondidatBundle\Controller;

use DataBundle\Entity\Accept;
use DataBundle\Entity\Demande;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wissem\CondidatBundle\Form\AjoutAcceptType;
use Symfony\Component\HttpFoundation\Request;

class AcceptController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    function AfficheAcceptAction()
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $username = $user->getUsername();



        }
        $em = $this->getDoctrine()->getManager();
        $accept = $em->getRepository("DataBundle:Accept")->findAll();

        return $this->render("WissemCondidatBundle:accept:accept.html.twig",
            array('user'=>$username,"accept" => $accept)
        );


    }

    function AfficheAcceptuserAction()
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            //$username = $user->getUsername();



        }
        $em = $this->getDoctrine()->getManager();
        $accept = $em->getRepository("DataBundle:Accept")->findBy(array('id_user'=>$user));

        return $this->render("WissemCondidatBundle:accept:gestDemandeUser.html.twig",
            array('accept' => $accept)
        );


    }



    public function SuppAcceptAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $dema= $em->getRepository("DataBundle:Accept")->findOneBy(array('idAccept'=>$id)) ;
        $em->remove($dema);
        $em->flush();

        return $this->redirectToRoute("wissem_condidat_acceptlist") ;
    }

    public function AjoutAcceptAction($id,Request $request) {



        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $username = $user->getUsername();



        }

        $accept=new Accept() ;
        $accept->setAgentName($username);

        $Form =$this->createForm(AjoutAcceptType::class, $accept) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($accept) ;
            $em->flush() ;
            return $this->redirectToRoute("wissem_condidat_acceptlist") ;
        }

        return $this->render("WissemCondidatBundle:accept:AjoutAccept.html.twig", array('user'=>$username,'formAjoutAccept'=> $Form->createView())) ;

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
