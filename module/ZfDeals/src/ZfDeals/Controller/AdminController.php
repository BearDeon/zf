<?php

namespace ZfDeals\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController{

    public function init(\Zend\ModuleManager\ModuleManager $moduleManager){
        
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(
            'ZfDeals\Controller\Admin', 
            'dispatch', 
            function($e){
                $controller = $e->getTarget();
                $controller->layout('zf-deals/layout/admin');
            }
        ); 
    }
    
    public function indexAction(){
        return new ViewModel();
    }
    
    public function addProductAction(){
           
        $form = new \ZfDeals\Form\ProductAdd();
        
        if($this->getRequest()->isPost()){
            
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()){
                // todo
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
}



