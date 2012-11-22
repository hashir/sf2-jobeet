<?php

namespace Como\FeedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller
{
    protected $entity;
    protected $constraint;
    protected $em;
    protected $outputFormat;
    public function __construct($entity, $constrt,EntityManager $entityManager, $format)
    {
        $this->entity = $entity;
        $this->constraint = $constrt;
        $this->em = $entityManager;
        $this->outputFormat = $format;
    }

    public function generateFeed()
    {
        foreach($this->entity as $ent):
           $this->feedTable[] = key($ent);   
           $this->args[key($ent)] = $ent[key($ent)];
        endforeach;
        
        foreach($this->constraint as $ent):   
           $this->cnst[key($ent)] = $ent[key($ent)];
        endforeach;
        
        $result = array();
        foreach ($this->feedTable as $table)
        {
            if(!isset($this->args[$table])){
                die("Out");
            }
            
            $this->args[$table] = array_map(function($value) { return 'j.'.$value; }, $this->args[$table]);            
            $fields = implode(',', $this->args[$table]);

            
            if(isset($this->cnst[$table]))
                $constraints = $this->cnst[$table];
            else
                $constraints = array();
            
            $qb = $this->em->getRepository($table)->createQueryBuilder('j')
                    ->select($fields);
            
            foreach ($constraints as $key => $value)
            {
                $qb = $qb ->andWhere("j.{$key} = {$value}");
            }
                    
            $query2 = $qb->getQuery();

            $result[$table] = $query2->getResult();
        }
        
        return new Response(json_encode($result),200,array('Content-Type'=>'application/json'));
    }
    
    public function indexAction($name)
    {
        return $this->render('ComoFeedBundle:Default:index.html.twig', array('name' => $name));
    }
    
}
