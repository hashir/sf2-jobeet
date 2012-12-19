<?php

namespace Como\AccommodationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Como\AccommodationBundle\Entity\ProductImage;
use Como\AccommodationBundle\Form\ProductImageType;

/**
 * ProductImage controller.
 *
 */
class ProductImageController extends Controller
{
    /**
     * Lists all ProductImage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ComoAccommodationBundle:ProductImage')->findAll();

        return $this->render('ComoAccommodationBundle:ProductImage:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ProductImage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:ProductImage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ProductImage entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductImage();
        $form   = $this->createForm(new ProductImageType(), $entity);

        return $this->render('ComoAccommodationBundle:ProductImage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ProductImage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProductImage();
        $form = $this->createForm(new ProductImageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productimage_show', array('id' => $entity->getId())));
        }

        return $this->render('ComoAccommodationBundle:ProductImage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductImage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductImage entity.');
        }

        $editForm = $this->createForm(new ProductImageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:ProductImage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProductImage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductImageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productimage_edit', array('id' => $id)));
        }

        return $this->render('ComoAccommodationBundle:ProductImage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductImage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ComoAccommodationBundle:ProductImage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductImage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('productimage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
