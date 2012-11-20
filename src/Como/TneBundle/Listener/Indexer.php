<?php

namespace Como\TneBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Como\TneBundle\Utils\Tne as Tne;

class Indexer {
    protected $Tne;
    public function __construct(\Como\TneBundle\Utils\Tne $Tne, array $entity_names){
//        print_r($entity_names);
        $this->Tne = $Tne;
    }
    public function postUpdate(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        die($this->Tne->getId());
        if ($entity instanceof \Como\TneBundle\Entity\Job) {
            $this->Tne->updateLuceneIndex($entity);
            }
        }
    
}
