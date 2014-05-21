<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view'
        ),
    ),
    'router' => array(
        'routes' => array(
            'sayhello' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/sayhello',
                    'defaults' => array(
                        'controller' => 'Helloworld\Controller\Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Helloworld\Controller\Index' 
                => function($serviceLokator){
    
                $ctr = new Helloworld\Controller\IndexController();
                
                $ctr = setGreetingService(
                    $serviceLokator->getServiceLokator()->getGreetingService()
                );
                
                return $ctr;
            }
        ),
        'invokables' => array(
            'Helloworld\Controller\Index' 
                => 'Helloworld\Controller\IndexController'
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'greetingService' 
                => 'Helloworld\Service\GreetingService'
        ),
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function($sm){
                $config = $sm->get('Config');
                $dbParams = $config['dbParams'];
                
                return new Zend\Db\Adapter\Adapter(array(
                    'driver' => 'Pdo_Mysql',
                    'dsn' => 'mysql:dbname='.$dbParams['database'].';host='.$dbParams['hostname'],
                    'database' => $dbParams['database'],
                    'username' => $dbParams['username'],
                    'password' => $dbParams['password'],
                    'hostname' => $dbParams['hostname'],
                ));
            },
        ),
    )
);