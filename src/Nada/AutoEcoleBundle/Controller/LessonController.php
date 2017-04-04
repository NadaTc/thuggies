<?php

namespace Nada\AutoEcoleBundle\Controller;

use DataBundle\Entity\Lesson;
use Nada\AutoEcoleBundle\Form\AjoutLessonType;
use Nada\AutoEcoleBundle\Form\ModifLessonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LessonController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    public function AfficheLessonAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $lesson = $em->getRepository('DataBundle:Lesson')->findAll();
        /**
         * @var $paginator \knp\Component\Pager\paginator
         */
        $paginator  = $this->get('knp_paginator');

        $result = $paginator->paginate(
            $lesson,
            $request->query->getInt('page',1) /*page number*/,
            $request->query->getInt('limit',3) /*limit per page*/
        );

        return $this->render("NadaAutoEcoleBundle:Lesson:ListLesson.html.twig", [
            'lesson' => $result,
        ]);
    }


    public function SuppLessonAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $lesson= $em->getRepository("DataBundle:Lesson")->findOneBy(array('idLesson'=>$id)) ;
        $em->remove($lesson);
        $em->flush();

        return $this->redirectToRoute("nada_auto_ecole_Cours") ;
    }

    public function AjoutLessonAction(Request $request) {
        $lesson=new Lesson() ;
        $Form =$this->createForm(AjoutLessonType::class, $lesson) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($lesson) ;
            $em->flush() ;
            return $this->redirectToRoute("nada_auto_ecole_LessonList") ;
        }

        return $this->render("NadaAutoEcoleBundle:Lesson:AjoutLesson.html.twig", array('formAjoutLesson'=> $Form->createView())) ;

    }



    public function ModifLessonAction($id, Request $request)
    {
        $em=$this->getDoctrine()->getManager() ;
        $lessonM= $em->getRepository("DataBundle:Lesson")->findOneBy(array('idLesson'=>$id)) ;

        $Form =$this->createForm(ModifLessonType::class, $lessonM) ;
        $Form->handleRequest($request) ;
        if($Form->isValid()) {
            $em=$this->getDoctrine()->getManager() ;
            $em->persist($lessonM) ;
            $em->flush() ;
            return $this->redirectToRoute("nada_auto_ecole_LessonList") ; }
        return $this->render('NadaAutoEcoleBundle:Lesson:ModifLesson.html.twig',
            array('formModifLesson'=>$Form->createView())) ;

    }
}
