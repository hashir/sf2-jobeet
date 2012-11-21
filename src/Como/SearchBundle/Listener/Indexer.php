<?php

namespace Como\SearchBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Como\SearchBundle\Utils\Search as Search;

class Indexer {
    protected $Search;
    protected $args;
    public function __construct(\Como\SearchBundle\Utils\Search $Search, array $entity_names, array $result){
        foreach($entity_names as $ent):
           $this->SearchEntities[] = key($ent);   
           $this->args[key($ent)] = $ent[key($ent)];
        endforeach;
        $this->Search = $Search;
    }
    public function postUpdate(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $ent = explode('\\', get_class($entity));
        $ent = $ent[count($ent)-1];
        if (in_array($ent,$this->SearchEntities)) { 
            $this->Search->updateLuceneIndex($entity, $ent, $this->args[$ent]);      
        }
   }
    
}
