<?php

namespace Yacine\NewsBundle\Controller;

use DataBundle\Entity\Actualite;
use DataBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Yacine\NewsBundle\Form\AjoutActualiteType;
use Yacine\NewsBundle\Form\AjoutComType;
use Yacine\NewsBundle\Form\ModifierActualiteType;



class ActualiteController extends Controller
{

    function AfficheNewsAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $actualite=$em->getRepository("DataBundle:Actualite")->findBy(array(), array('idActualite' => 'DESC'));

        /**
         * @var $paginator \knp\Component\Pager\paginator
         */

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $actualite,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 3) /*limit per page*/

        );
        return $this->render("YacineNewsBundle:Actualite:affiche.html.twig", ['actualite'=>$pagination]);
    }

    function AfficheComActAction(Request $request, $id)
    {$em = $this->getDoctrine()->getManager();
        $commentaire=$em->getRepository("DataBundle:Commentaire")->findBy(array('idActualite'=>$id), array('idCommentaire' =>  'DESC'));

        $adccom = new Commentaire();
        $Form = $this->createForm(AjoutComType::class, $adccom);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adccom);
            $em->flush(); }

        return $this->render("NadaAutoEcoleBundle:Quiz:taxi.html.twig", array('comact' => $commentaire, 'formAddCom'=> $Form->createView() )) ;
        }




    function AfficheclientNewsAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $actualite=$em->getRepository("DataBundle:Actualite")->findBy(array(), array('idActualite' => 'DESC'));
        $commentaire=$em->getRepository("DataBundle:Commentaire")->findBy(array(), array('idCommentaire' =>  'DESC'));
        $plus =$em->getRepository("DataBundle:Actualite")->findBy(array('nbvote'=> 5) ) ;
        /**
         * @var $paginator \knp\Component\Pager\paginator
         */

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $actualite,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 3) /*limit per page*/   );

        $adccom = new Commentaire();
      //  $adccom->setIdActualite($actualite->) ;
        $Form = $this->createForm(AjoutComType::class, $adccom);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adccom);
            $em->flush(); }


        return $this->render("NadaAutoEcoleBundle:Quiz:taxi.html.twig", ['actualite'=>$pagination,'commentaire'=>$commentaire, 'plus'=>$plus, 'AddCom'=> $Form->createView() ]);
    }

    function AfficheBackNewsAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $actualite=$em->getRepository("DataBundle:Actualite")->findBy(array(), array('idActualite' => 'DESC'));
        $commentaire=$em->getRepository("DataBundle:Commentaire")->findBy(array(), array('idCommentaire' =>  'DESC'));

        /**
         * @var $paginator \knp\Component\Pager\paginator
         */

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $actualite,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 3) /*limit per page*/

        );
        return $this->render("@YacineNews/Actualite/ActuBack.html.twig", ['actualite'=>$pagination,'commentaire'=>$commentaire]);
    }


        public function SuppActualiteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $actualite= $em->getRepository("DataBundle:Actualite")->findOneBy(array('idActualite'=>$id)) ;
        $em->remove($actualite);
        //var_dump($actualite);
        $em->flush();

        return $this->redirectToRoute("yacine_news_afficheBack") ;
    }



        public function AjoutActualiteAction(Request $request)
    {
        $actualite = new Actualite();
        $Form = $this->createForm(AjoutActualiteType::class, $actualite);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actualite);
            $em->flush();
            return $this->redirectToRoute("yacine_news_afficheBack");
        }
        return $this->render("YacineNewsBundle:Actualite:AjouterNews.html.twig", array('formAjoutActualite'=> $Form->createView())) ;

    }







        public function ModifierActualiteAction($id, Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $actualite = $em->getRepository("DataBundle:Actualite")->findOneBy(array('idActualite' => $id));

            $Form = $this->createForm(ModifierActualiteType::class, $actualite);
            $Form->handleRequest($request);
            if ($Form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($actualite);
                $em->flush();
                return $this->redirectToRoute("yacine_news_afficheBack");
            }


        return $this->render("YacineNewsBundle:Actualite:ModifierNews.html.twig", array('formModifier'=> $Form->createView())) ;

    }
    public function AjoutcomAction( Request $request)
    {
        $commentaire = new Commentaire();


        $Form = $this->createForm(AjoutComType::class, $commentaire);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute("yacine_news_affiche");
        }
        return $this->render("YacineNewsBundle:Actualite:com.html.twig", array('formcom'=> $Form->createView())) ;

    }
    function AfficheComAction(){
        $em = $this->getDoctrine()->getManager();
        $commentaire=$em->getRepository("DataBundle:Commentaire")->findBy(array(), array('idCommentaire' => 'DESC'));

        return $this->render("YacineNewsBundle:Actualite:affichez.html.twig", array("commentaire"=> $commentaire));
    }
    public function Ajoutcom2Action($id, Request $request)
    {
        $commentaire = new Commentaire();
        $Form = $this->createForm(AjoutComType::class, $commentaire);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $actualite = $em->getRepository("DataBundle:Actualite")->findOneBy(array('idActualite' => $id));
            $em->persist($commentaire);
            $em->persist($actualite);
            $em->flush();
            return $this->redirectToRoute("yacine_news_affiche");
        }
        return $this->render("YacineNewsBundle:Actualite:com.html.twig", array('formcom'=> $Form->createView())) ;

    }




}
