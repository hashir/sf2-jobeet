<?php

namespace Como\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $objs = $em->getRepository('ComoAccommodationBundle:Product')->getProductList();
        
        return $this->render('ComoFrontBundle:Default:index.html.twig', array('objs' => $objs));
    }
}
