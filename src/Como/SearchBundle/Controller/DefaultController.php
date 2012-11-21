<?php

namespace Como\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Como\SearchBundle\Utils\Search as Search;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ComoSearchBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function searchAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        
        $hits = Search::getLuceneIndex()->find($name);

          $pks = array();
          foreach ($hits as $hit)
          {
            $pks[] = $hit->pk;
          }

          if (empty($pks))
          {
            $results= '';
          }else{
              
          
            $query = $em->getRepository('\Como\TneBundle\Entity\Job')->createQueryBuilder('j')
            ->where('j.expires_at > :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->andWhere('j.is_activated = :activated')
            ->setParameter('activated', 1)
            ->andWhere('j.id IN ( :pks )')        
            ->setParameter('pks',$pks)
            ->getQuery();
            
            $results = $query->getResult();
          }
        return $this->render('ComoSearchBundle:Default:search.html.twig', array('results' => $results));
    }
}
