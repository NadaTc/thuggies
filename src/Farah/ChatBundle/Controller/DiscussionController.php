<?php

namespace Farah\ChatBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Discussion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Farah\ChatBundle\Form\DiscussionForm;
use function Symfony\Component\Validator\Tests\Constraints\choice_callback;

class DiscussionController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    function afficherDAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->FindAlld();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function afficherDateAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->OrderDateDQL();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function afficherDiscExAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->OrderDateDQL();

        return $this->render("FarahChatBundle:Discussion:afficheback.html.twig",array("discussions"=>$discussions));
    }





    function AjoutAction(Request $request)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $username = $user->getUsername();
        }
        $discussion=new Discussion();
        $discussion->setNomUtilisateur( $username );
        //$discussion->setDateDisc(new \DateTime('now'));
        $Form=$this->createForm(DiscussionForm::class,$discussion);
        $Form->handleRequest($request);
        if ($Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($discussion);
            $em->flush();
            return $this->redirectToRoute("farah_chat_afficheDate");
        }
        return $this->render("FarahChatBundle:Discussion:ajoutDiscussion.html.twig",array('form'=>$Form->createView()));
    }







    public function  ModifierAction($id_discussion, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $discussion = $em->getRepository('DataBundle:Discussion')->find($id_discussion);
        $Form = $this->createForm(DiscussionForm::class, $discussion);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em->persist($discussion);
            $em->flush();
            return $this->redirectToRoute('farah_chat_afficheDate');
        }
        return $this->render('FarahChatBundle:Discussion:modifierDiscussion.html.twig',
            array('form' => $Form->createView()));
    }





    public function SuppAction($id_discussion)
    {

        $em = $this->getDoctrine()->getManager();
        $discussion= $em->getRepository('DataBundle:Discussion')->findOneBy(array('idDiscussion'=>$id_discussion)) ;
        
        $em->remove($discussion);
        $em->flush();

        return $this->redirectToRoute('farah_chat_afficheDate') ;
    }


    public function SuppDEAction($id_discussion)
    {

        $em = $this->getDoctrine()->getManager();
        $discussion= $em->getRepository('DataBundle:Discussion')->findOneBy(array('idDiscussion'=>$id_discussion)) ;

        $em->remove($discussion);
        $em->flush();

        return $this->redirectToRoute('farah_chat_afficheDE') ;
    }


    function PanneMAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->PanneM();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function AutreAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->Autre();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function CPneuAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->CPneu();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function MgAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->MG();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function PanneRAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->PanneR();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function PanneEAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->PanneE();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function PanneTAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->PanneT();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }

    function ToPeAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->ToPe();

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }




    function TitreAction($key){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->findTitre($key);

        return $this->render("FarahChatBundle:Discussion:afficheDiscussion.html.twig",array("discussions"=>$discussions));
    }



    function CountAction(){
        $em=$this->getDoctrine()->getManager();

        $discussions=$em->getRepository("DataBundle:Discussion")->CountPanneM();

        return $this->render("FarahChatBundle:Default:index.html.twig",array("discussions"=>$discussions));
    }


}
