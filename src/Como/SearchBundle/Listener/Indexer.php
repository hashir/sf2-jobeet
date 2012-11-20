<?php

namespace Como\SearchBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Como\SearchBundle\Utils\Search as Search;

class Indexer {
    protected $Search;
    public function __construct(\Como\SearchBundle\Utils\Search $Search, array $entity_names){
       $this->SearchEntities = $entity_names['SearchEntities'];
        $this->Search = $Search;
    }
    public function postUpdate(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
//        die($this->Search->getId());
//        if ($entity instanceof \Como\SearchBundle\Entity\Job) {
//            $this->Search->updateLuceneIndex($entity);
//            }
        $ent = explode('\\', get_class($entity));
        $ent = $ent[count($ent)-1];
        if (in_array($ent,$this->SearchEntities)) {
            $this->Search->updateLuceneIndex($entity);      
        }
   }
    
}
