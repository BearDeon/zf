<?php

namespace HelloworldMod;

class Module{
    
    public function getConfig(){
        
        return array(
            'router' => array(
                'routes' => array(
                    'sayhello' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route' => '/welcome'
                        )
                    )
                )
            )
        );
    }
}
