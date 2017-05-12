<?php


namespace Farah\ChatBundle\Controller;

use DataBundle\Entity\CommentaireDiscussion;
use Farah\ChatBundle\Form\CommentaireForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CommentaireController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    function afficherAllAction(){
        $em=$this->getDoctrine()->getManager();
        $commentaires=$em->getRepository("DataBundle:CommentaireDiscussion")->findAll();
        return $this->render("FarahChatBundle:Commentaire:afficheCommentaire.html.twig",array("commentaires"=>$commentaires));
    }

    function afficherComAction($id_dis){
        $em=$this->getDoctrine()->getManager();
        $commentaires=$em->getRepository("DataBundle:CommentaireDiscussion")->ajoutParameter($id_dis);
        return $this->render("FarahChatBundle:Commentaire:afficheCommentaire.html.twig",array("commentaires"=>$commentaires));
    }




    function afficherComExAction($id_dis){
        $em=$this->getDoctrine()->getManager();
        $commentaires=$em->getRepository("DataBundle:CommentaireDiscussion")->ajoutParameter($id_dis);
        return $this->render("FarahChatBundle:Commentaire:afficheCommentaieEx.html.twig",array("commentaires"=>$commentaires));
    }

    function Ajout1Action($id_dis,Request $request){
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $username = $user->getUsername();
        }


        $commentaire_discussion=new CommentaireDiscussion();
        $em=$this->getDoctrine()->getManager() ;


        if ($request->isMethod('Post')) {
            $commentaire_discussion->getNomUtilisateur($username);
            $commentaire_discussion->setTextComdis($request->get('text_comdis'));
            $commentaire_discussion->setIdDisc($id_dis);
            var_dump($commentaire_discussion);
            $commentaire_discussion->setDateCom(new \DateTime('now'));
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($commentaire_discussion);
            $em->flush() ;
            return $this->redirectToRoute("farah_chat_afficheCom") ;
        }
        return $this->render("FarahChatBundle:Commentaire:ajoutCommentaire.html.twig", array()) ;

    }


    function AjoutComExAction($id_dis,Request $request){
        $commentaire_discussion=new CommentaireDiscussion();
        $em=$this->getDoctrine()->getManager() ;


        if ($request->isMethod('Post')) {
            $commentaire_discussion->setTextComdis($request->get('text_comdis'));
            $commentaire_discussion->setIdDisc($id_dis);
           //X $commentaire_discussion->setDateCom(new \DateTime('now'));
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($commentaire_discussion);
            $em->flush() ;
            return $this->redirectToRoute("farah_chat_afficheComEx") ;
        }
        return $this->render("FarahChatBundle:Commentaire:ajoutCommentaireEx.html.twig", array()) ;

    }


    public function  ModifierCAction($id_commentaire, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('DataBundle:CommentaireDiscussion')->find($id_commentaire);
        $Form = $this->createForm(CommentaireForm::class, $commentaire);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('farah_chat_afficheC');
        }
        return $this->render('FarahChatBundle:Commentaire:modifierCom.html.twig',
            array('form' => $Form->createView()));
    }


    public function  ModifierComExAction($id_commentaire, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('DataBundle:CommentaireDiscussion')->find($id_commentaire);
        $Form = $this->createForm(CommentaireForm::class, $commentaire);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('farah_chat_afficheComEx');
        }
        return $this->render('FarahChatBundle:Commentaire:modifierCommentaireEx.html.twig',
            array('form' => $Form->createView()));
    }

    public function SuppAction($id_commentaire)
    {

        $em = $this->getDoctrine()->getManager();
        $commentaire= $em->getRepository('DataBundle:CommentaireDiscussion')->findOneBy(array('idComdis'=>$id_commentaire)) ;
        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('farah_chat_afficheC') ;
    }


    public function SuppComExAction($id_commentaire)
    {

        $em = $this->getDoctrine()->getManager();
        $commentaire= $em->getRepository('DataBundle:CommentaireDiscussion')->findOneBy(array('idComdis'=>$id_commentaire)) ;
        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('farah_chat_afficheComEx') ;
    }

}
