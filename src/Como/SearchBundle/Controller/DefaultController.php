<?php

namespace Como\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
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

        $resultEntities = $this->container->getParameter('como.index.results');

        foreach ($resultEntities as $ent):
            foreach ($ent as $e):
                $resultEntity[] = $e;
            endforeach;
        endforeach;
/**
 * Lucene search......
 *
        set_include_path(get_include_path().PATH_SEPARATOR.'/home/hashir/projects/tneexrc/src/Como/SearchBundle/');
        require_once  __DIR__.'/../Zend/Search/Lucene/Search/QueryParser.php';
        
        $luceneQueryString = strtolower($name);
        $luceneQuery = \Zend_Search_Lucene_Search_QueryParser::parse($luceneQueryString, 'utf-8');
        $lq = new \Zend_Search_Lucene_Search_Query_Boolean();
        $lq->addSubquery($luceneQuery, true);
 * 
 */
     
        foreach ($resultEntity as $res) {
            
            $hits[$res] = Search::getLuceneIndex($res)->find($name);
        }
        
        $pks = array();
        foreach ($hits as $key => $hit) {
            foreach ($hit as $h)
                $pks[$key][] = $h->pk;
        }

        if (empty($pks)) {
            $results = '';
        } else {
            $results = $pks; 
        }
//        return $this->render('ComoSearchBundle:Default:search.html.twig', array('results' => $results));
        
        $response = new Response(json_encode($results),200,array('Content-Type'=>'application/json'));
        return $response;
    }
}
