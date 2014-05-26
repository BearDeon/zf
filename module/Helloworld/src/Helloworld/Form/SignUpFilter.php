<?php

namespace Helloworld\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class SignUpFilter extends InputFilter{
    
    public function __construct() {
        
        $this->add(
            array(
                'name' => 'email',
                //'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Это поле не должно быть пустым.'
                            )
                        )
                    ),
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            'messages' => array(
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Неправильный формат e-mail.'
                            )
                        )
                        
                    )
                )
            )
        );
        
        $this->add(
            array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Это поле не должно быть пустым.' 
                            )
                        )
                    )
                )
            )
        );
    }
}