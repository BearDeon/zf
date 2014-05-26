<?php

namespace Helloworld\Form;

use Zend\Form\Fieldset;

class UserFieldSet extends Fieldset{
    
    public function __construct() {
        
        parent::__construct('user');
        
        $this->add(
            array(
                'name' => 'name',
                'attributes' => array(
                    'type' => 'text',
                    'id' => 'name'
                ),
                'options' => array(
                    'id' => 'name',
                    'label' => 'Full Name:'
                )
            )     
        );
        
        $this->add(
            array(
                'name' => 'email',
                'attributes' => array(
                    'type' => 'email'
                ),
                'options' => array(
                    'id' => 'email',
                    'label' => 'Email Address:'
                )
            )
        );
        
        $this->add(
            array(
                'type' => 'Helloworld\Form\UserAddressFieldset'
            )
        );
    }
    
    public function getInputFilterSpecification(){
        
        return array(
            'email' => array(
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
            ),
           'name' => array(
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
