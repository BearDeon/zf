<?php

return array(
    'router' => array(
        'routes' => array(
            'test' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/test',
                    'defaults' => array(
                        'controller' => 'Test\Controller\Index',
                        'action' => 'index'
                    )
                )
            )
            
        )
    ),
    'view_manager' => array(
        //* Адрес где лежат представления
        'template_path_stack' => array(
            __DIR__.'/../view'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Test\Controller\Index' => 'Test\Controller\IndexController' 
        )  
    )
);
