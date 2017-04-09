<?php

namespace Nada\AutoEcoleBundle\Controller;

use DataBundle\Entity\Quiz;
use Nada\AutoEcoleBundle\Form\AjoutQuizType;
use Nada\AutoEcoleBundle\Form\ModifQuizType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class QuizController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function showAllQuizAction(Request $request)


    {
        $em = $this->getDoctrine()->getManager();

        $qz=$em->getRepository("DataBundle:Quiz")->findAll() ;
        /**
         * @var $paginator \knp\Component\Pager\paginator
         */
        $paginator = $this->get('knp_paginator');

        $result = $paginator->paginate(
            $qz,
            $request->query->getInt('page', 1) /*page number*/,
            $request->query->getInt('limit', 4) /*limit per page*/

        );
        return $this->render("NadaAutoEcoleBundle:Quiz:AllQuiz.html.twig", [
            'qz' => $result,
        ]);

 }

    public function showQuizQAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $qz=$em->getRepository("DataBundle:Quiz")->findBy(array('test'=>$id)) ;

        return $this->render("NadaAutoEcoleBundle:Quiz:ListQuiz.html.twig", array("qz" =>$qz)) ;



    }


    public function showQuizFrontQAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $qA=$em->getRepository("DataBundle:Quiz")->findOneBy(array('test'=>$id, 'idQuiz'=>1)) ;
        $qB=$em->getRepository("DataBundle:Quiz")->findOneBy(array('test'=>$id, 'question'=>"Après ce panneau :")) ;
            $qC=$em->getRepository("DataBundle:Quiz")->findOneBy(array('test'=>$id, 'al2'=>"Non")) ;
           $qD=$em->getRepository("DataBundle:Quiz")->findOneBy(array('test'=>$id, 'idQuiz'=>6)) ;
        $qE=$em->getRepository("DataBundle:Quiz")->findOneBy(array('test'=>$id, 'idQuiz'=>7)) ;



        return $this->render("NadaAutoEcoleBundle:Quiz:passageQuiz.html.twig", ["qA" =>$qA ,'qB'=>$qB, 'qC'=>$qC , 'qD' =>$qD, 'qE'=>$qE] );




    }



    public function AjoutQuizAction(Request $request) {
        $quiz=new Quiz() ;
        $Form =$this->createForm(AjoutQuizType::class, $quiz) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($quiz) ;
            $em->flush() ;
            return $this->redirectToRoute("nada_auto_ecole_Test") ;
        }

        return $this->render("NadaAutoEcoleBundle:Quiz:AjoutQuiz.html.twig", array('formAjoutQuiz'=> $Form->createView())) ;

    }


    public function SuppQuizAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $quiz= $em->getRepository("DataBundle:Quiz")->findOneBy(array('idQuiz'=>$id)) ;
        $em->remove($quiz);
        $em->flush();

        return $this->redirectToRoute("nada_auto_ecole_Test") ;
    }


    public function ModifQuizAction($id, Request $request)
    {
        $em=$this->getDoctrine()->getManager() ;
        $quiz= $em->getRepository("DataBundle:Quiz")->findOneBy(array('idQuiz'=>$id )) ;

        $Form =$this->createForm(ModifQuizType::class, $quiz) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($quiz) ;
            $em->flush() ;

            return $this->redirectToRoute("nada_auto_ecole_Test")
                ; }
        return $this->render('NadaAutoEcoleBundle:Quiz:ModifQuiz.html.twig',
            array('formModifQuiz'=>$Form->createView())) ;

    }


    public function TaxiAction() {

       return $this ->render("NadaAutoEcoleBundle:Quiz:taxi.html.twig");

    }
}
