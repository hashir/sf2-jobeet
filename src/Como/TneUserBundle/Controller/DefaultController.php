<?php

namespace Como\TneUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ComoTneUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
