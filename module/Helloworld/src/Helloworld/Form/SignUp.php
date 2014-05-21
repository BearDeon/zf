<?php

namespace Helloworld\Form;

use Zend\Form\Form;

class SignUp extends Form{
    
    public function __construct() {
        
        parent::__construct('SignUp');
        $this->setAttribute('action', '/signup');
        $this->setAttribute('method', 'post');
        
        $this->add(
            array(
                'name' => 'name',
                'attributes' => array(
                    'type' => 'text',
                    'id' => 'name'
                ),
                'options' => array(
                    'label' => 'FullName:'
                )
            )
        );
        
        $this->add(
            array(
                'name' => 'email',
                'attributes' => array(
                    'type' => 'email',
                    'id' => 'email'
                ),
                'options' => array(
                    'label' => 'Email address:'
                )
            )
        );
        
        $this->add(
                array(
                    'name' => 'submit',
                    'attributes' => array(
                        'type' => 'submit',
                        'value' => 'Register now'
                    )
                )
        );
    }
}