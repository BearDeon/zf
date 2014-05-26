<?php

namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{   
    private $greetingService;
    
    public function indexAction() 
    { 
     
         $greetingSrv = $this->getServiceLocator()->get('greetingService');
        
        $url = $this->url()->fromRoute('sayhello');
        
        $flashMessenger = $this->flashMessenger();
        
        if($flashMessenger->hasMessages()){
            
            $message = $flashMessenger->getMessages();
            $flashMessenger->addMessage($message[0]+1);
            
            //print_r($message);
            
        }else{
            
            $message = 1;
            
            $flashMessenger->addMessage($message);
        }
        
        return new ViewModel(
            array(
                'greeting' => $greetingSrv->getGreeting(), //$this->greetingService->getGreeting()
                'url' => $url,
                'date' => $this->currentDate()
            )
        );         
          
    }
    
    public function signupAction(){
        
        $form = new \Helloworld\Form\SignUp();
        $form->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
        $form->bind(new \Helloworld\Entity\User());
        
        if($this->getRequest()->isPost()){
            
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()){
                var_dump($form->getData()); 
            }else{
                return new ViewModel(
                    array(
                        'form' => $form
                    )
                );
            }
        }else{
            return new ViewModel(
                array(
                    'form' => $form
                )
            );
        }   
    }


    public function setGreetingService($service)
    {
        $this->greetingService = $service;
    }
}