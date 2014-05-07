<?php

namespace Helloworld\Service;
use Zend\EventManager\EventManagerInterface;

class GreetingService {
    
    private $eventManager;
    
    public function getGreeting(){
        
        //$this->eventMager->trigger('getGreeting');
        
        if(date("H") <= 11){
            return "Доброе утро, мир!";
        }else if(date("H") > 11 && date("H") < 17){
            return "Привет, мир!";
        }else{
            return "Добрый вечер, мир!"; 
        }
    }
    
    public function getEventManager(){
        return $this->eventManager();
    }
    
    public function setEventManager(EventManagerInterface $em){
        $this->eventManager = $em;
    }
}