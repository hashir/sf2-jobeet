<?php

namespace Como\AccommodationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Como\AccommodationBundle\Entity\ProductExternal;
use Como\AccommodationBundle\Form\ProductExternalType;

/**
 * ProductExternal controller.
 *
 */
class ProductExternalController extends Controller
{
    /**
     * Lists all ProductExternal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ComoAccommodationBundle:ProductExternal')->findAll();

        return $this->render('ComoAccommodationBundle:ProductExternal:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ProductExternal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductExternal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductExternal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:ProductExternal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ProductExternal entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductExternal();
        $form   = $this->createForm(new ProductExternalType(), $entity);

        return $this->render('ComoAccommodationBundle:ProductExternal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ProductExternal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ProductExternal();
        $form = $this->createForm(new ProductExternalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productexternal_show', array('id' => $entity->getId())));
        }

        return $this->render('ComoAccommodationBundle:ProductExternal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductExternal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductExternal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductExternal entity.');
        }

        $editForm = $this->createForm(new ProductExternalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoAccommodationBundle:ProductExternal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ProductExternal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoAccommodationBundle:ProductExternal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductExternal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductExternalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productexternal_edit', array('id' => $id)));
        }

        return $this->render('ComoAccommodationBundle:ProductExternal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductExternal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ComoAccommodationBundle:ProductExternal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductExternal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('productexternal'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
