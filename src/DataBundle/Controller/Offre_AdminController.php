<?php

namespace DataBundle\Controller;

use DataBundle\Entity\Offre;
use DataBundle\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Offre_AdminController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('DataBundle:Offre')->findBy(array(), array('idOffre' => 'DESC'));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $offres,
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 2)) ;/*limit per page*/

        return $this->render('DataBundle:OffreAdmin:index.html.twig', array(
            'offres' => $pagination,
        ));
    }

    /**
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {
        $offre = new Offre();
        $v = new Voiture();
        $form = $this->createForm('DataBundle\Form\OffreType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $currentdate= new \DateTime("now");
            $offre ->setDateOffre($currentdate);

            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute('Admin_consulte_offre', array('idOffre' => $offre->getIdoffre()));
        }

        return $this->render('DataBundle:OffreAdmin:new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('DataBundle:OffreAdmin:show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('DataBundle\Form\OffreType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Admin_gestion_offre', array('idOffre' => $offre->getIdoffre()));
        }

        return $this->render('DataBundle:OffreAdmin:edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request, Offre $offre)
    {
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush();
        }

        return $this->redirectToRoute('Admin_gestion_offre');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offre $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Admin_delete_offre', array('idOffre' => $offre->getIdoffre())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
