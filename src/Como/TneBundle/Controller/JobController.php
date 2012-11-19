<?php

namespace Como\TneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Como\TneBundle\Entity\Job;
use Como\TneBundle\Form\JobType;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{
    /**
     * Lists all Job entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $format = $this->getRequest()->getRequestFormat();

//        $entities = $em->getRepository('ComoTneBundle:Job')->findAll();
         $categories = $em->getRepository('ComoTneBundle:Category')->getWithJobs();
 
          foreach($categories as $category)
          {
            $category->setActiveJobs($em->getRepository('ComoTneBundle:Job')->getActiveJobs($category->getId(),$this->container->getParameter('max_jobs_on_homepage')));
            $category->setMoreJobs($em->getRepository('ComoTneBundle:Job')->countActiveJobs($category->getId()) - $this->container->getParameter('max_jobs_on_homepage'));
          }


        return $this->render('ComoTneBundle:Job:index.'.$format.'.twig', array(
            'categories' => $categories,
            'lastUpdated' => $em->getRepository('ComoTneBundle:Job')->getLatestPost()->getCreatedAt()->format(DATE_ATOM),
            'feedId' => sha1($this->get('router')->generate('job', array('_format'=> 'atom'), true)),
        ));
    }

    /**
     * Finds and displays a Job entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ComoTneBundle:Job')->getActiveJob($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ComoTneBundle:Job:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Job entity.
     *
     */
    public function newAction()
    {
        $entity = new Job();
        $form   = $this->createForm(new JobType(), $entity);

        return $this->render('ComoTneBundle:Job:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Job entity.
     *
     */
   public function createAction()
    {
      $entity  = new Job();
      $request = $this->getRequest();
      $form    = $this->createForm(new JobType(), $entity);
      $form->bindRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();

        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('job_preview', array(
          'company' => $entity->getCompanySlug(),
          'location' => $entity->getLocationSlug(),
          'token' => $entity->getToken(),
          'position' => $entity->getPositionSlug()
        )));
      }

      return $this->render('ComoTneBundle:Job:new.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView()
      ));
    }

    /**
     * Displays a form to edit an existing Job entity.
     *
     */
    public function editAction($token)
    {
      $em = $this->getDoctrine()->getEntityManager();

      $entity = $em->getRepository('ComoTneBundle:Job')->findOneByToken($token);

      if (!$entity) {
        throw $this->createNotFoundException('Unable to find Job entity.');
      }

      $editForm = $this->createForm(new JobType(), $entity);
      $deleteForm = $this->createDeleteForm($token);

      return $this->render('ComoTneBundle:Job:edit.html.twig', array(
        'entity'      => $entity,
        'edit_form'   => $editForm->createView(),
        'delete_form' => $deleteForm->createView(),
      ));
    }

    /**
     * Edits an existing Job entity.
     *
     */
    public function updateAction($token)
    {
      $em = $this->getDoctrine()->getEntityManager();

      $entity = $em->getRepository('ComoTneBundle:Job')->findOneByToken($token);

      if (!$entity) {
        throw $this->createNotFoundException('Unable to find Job entity.');
      }

      $editForm   = $this->createForm(new JobType(), $entity);
      $deleteForm = $this->createDeleteForm($token);

      $request = $this->getRequest();

      $editForm->bindRequest($request);

      if ($editForm->isValid()) {
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('job_preview', array(
          'company' => $entity->getCompanySlug(),
          'location' => $entity->getLocationSlug(),
          'token' => $entity->getToken(),
          'position' => $entity->getPositionSlug()
        )));
      }

      return $this->render('ComoTneBundle:Job:edit.html.twig', array(
        'entity'      => $entity,
        'edit_form'   => $editForm->createView(),
        'delete_form' => $deleteForm->createView(),
      ));
    }

    /**
     * Deletes a Job entity.
     *
     */
    public function deleteAction($token)
    {
      $form = $this->createDeleteForm($token);
      $request = $this->getRequest();

      $form->bindRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ComoTneBundle:Job')->findOneByToken($token);

        if (!$entity) {
          throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $em->remove($entity);
        $em->flush();
      }

      return $this->redirect($this->generateUrl('job'));
    }

    private function createDeleteForm($token)
    {
      return $this->createFormBuilder(array('token' => $token))
        ->add('token', 'hidden')
        ->getForm()
      ;
    }
    
    public function previewAction($token)
    {
      $em = $this->getDoctrine()->getEntityManager();
 
      $entity = $em->getRepository('ComoTneBundle:Job')->findOneByToken($token);

      if (!$entity) {
        throw $this->createNotFoundException('Unable to find Job entity.');
      }      

      $deleteForm = $this->createDeleteForm($entity->getId());
      $publishForm = $this->createPublishForm($entity->getToken());

      return $this->render('ComoTneBundle:Job:show.html.twig', array(
        'entity'      => $entity,
        'delete_form' => $deleteForm->createView(),
        'publish_form' => $publishForm->createView(),
      ));
    }

    public function publishAction($token)
    {
      $form = $this->createPublishForm($token);
      $request = $this->getRequest();

      $form->bindRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ComoTneBundle:Job')->findOneByToken($token);

        if (!$entity) {
          throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $entity->publish();
        $em->persist($entity);
        $em->flush();

        $this->get('session')->setFlash('notice', 'Your job is now online for 30 days.');
      }

      return $this->redirect($this->generateUrl('job_preview', array(
        'company' => $entity->getCompanySlug(),
        'location' => $entity->getLocationSlug(),
        'token' => $entity->getToken(),
        'position' => $entity->getPositionSlug()
      )));
    }

    private function createPublishForm($token)
    {
      return $this->createFormBuilder(array('token' => $token))
        ->add('token', 'hidden')
        ->getForm()
      ;
    }
}
