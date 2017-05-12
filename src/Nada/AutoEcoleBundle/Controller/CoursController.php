<?php

namespace Nada\AutoEcoleBundle\Controller;

use DataBundle\Entity\CoursCode;
use Nada\AutoEcoleBundle\Form\AjoutCoursType;
use Nada\AutoEcoleBundle\Form\ModifCoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoursController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    public function ShowLessonCoursAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $lessons = $em->getRepository("DataBundle:Lesson")->findBy(array('cours' => $id));

        return $this->render("NadaAutoEcoleBundle:Cours:ListLessonBack.html.twig", array("lesson" => $lessons));
    }

    /*   function AfficheCoursFrontAction()
       {
           $em = $this->getDoctrine()->getManager();
           $cours = $em->getRepository("DataBundle:CoursCode")->findAll();

           return $this->render("NadaAutoEcoleBundle:Cours:ListCoursFront.html.twig",
               array("cours" => $cours) );    } */

    public function AfficheCoursFrontAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        $cours = $em->getRepository('DataBundle:CoursCode')->findAll();


        /**
         * @var $paginator \knp\Component\Pager\paginator
         */
        $paginator = $this->get('knp_paginator');

        $result = $paginator->paginate(
            $cours,
            $request->query->getInt('page', 1) /*page number*/,
            $request->query->getInt('limit', 4) /*limit per page*/

        );


        return $this->render("NadaAutoEcoleBundle:Cours:ListCoursFront.html.twig", [
            'cours' => $result,
        ]);
    }


    public function AfficheCoursAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $cours = $em->getRepository('DataBundle:CoursCode')->findAll();
        /**
         * @var $paginator \knp\Component\Pager\paginator
         */
        $paginator = $this->get('knp_paginator');

        $result = $paginator->paginate(
            $cours,
            $request->query->getInt('page', 1) /*page number*/,
            $request->query->getInt('limit', 5) /*limit per page*/
        );

        return $this->render("NadaAutoEcoleBundle:Cours:ListCours.html.twig", [
            'cours' => $result,
        ]);
    }


    public function SuppCoursAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $cours = $em->getRepository("DataBundle:CoursCode")->findOneBy(array('idCours' => $id));
        $em->remove($cours);
        $em->flush();

        return $this->redirectToRoute("nada_auto_ecole_Cours");
    }


    public function AjoutCoursAction(Request $request)
    {
        $cours = new CoursCode();
        $Form = $this->createForm(AjoutCoursType::class, $cours);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();
            return $this->redirectToRoute("nada_auto_ecole_Cours");
        }

        return $this->render("NadaAutoEcoleBundle:Cours:AjoutCours.html.twig", array('formAjoutCours' => $Form->createView()));

    }


    public function ModifCoursAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $coursM = $em->getRepository("DataBundle:CoursCode")->findOneBy(array('idCours' => $id));

        $Form = $this->createForm(ModifCoursType::class, $coursM);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coursM);
            $em->flush();
            return $this->redirectToRoute("nada_auto_ecole_Cours");
        }
        return $this->render('NadaAutoEcoleBundle:Cours:Modif.html.twig',
            array('formModifCours' => $Form->createView()));

    }


    public function AfficheLessonAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();


        $cours = $em->getRepository("DataBundle:CoursCode")->findAll();
        $lesson = $em->getRepository('DataBundle:Lesson')->findBy(array('cours' => $id));
        $plus =$em->getRepository("DataBundle:CoursCode")->findBy(array('nbvote'=> 5) ) ;
        /**
         * @var $paginator \knp\Component\Pager\paginator
         */
        $paginator = $this->get('knp_paginator');

        $result = $paginator->paginate(
            $lesson,
            $request->query->getInt('page', 1) /*page number*/,
            $request->query->getInt('limit', 2) /*limit per page*/
        );

        return $this->render("NadaAutoEcoleBundle:Cours:Lesson.html.twig", [
            'lesson' => $result, 'cours' => $cours, 'plus'=>$plus
        ]);

    }
}
