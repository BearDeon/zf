<?php

namespace Helloworld\Form;

use Zend\Form\Form;

class SignUp extends Form{
    
    public function __construct() {
        
        parent::__construct('SignUp');
        $this->setAttribute('action', '/signup');
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new \Helloworld\Form\SignUpFilter());
        /*
            $this->add(new \Helloworld\Form\UserFieldSet());
        */
        
        /*
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
        */
        
        $this->add(
            array(
                'type' => 'Helloworld\Form\UserFieldset',
                'options' => array(
                    'use_as_base_fieldset' => true
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