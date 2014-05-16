<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator;


class ContactFormFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim',
                        'name' => 'StripTags',
                    ),
                ),
            ));
        $this->add(array(
                'name' => 'email',
                'required' => true,
                'filters' =>array(
                    array(
                        'name' => 'StringTrim'
                    ),
                ),
                'validators' => array(
                    array(
                        'name' => 'EmailAddress'
                    ),
                ),
            ));
        $this->add(array(
                'name' => 'message',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim',
                        'name' => 'StripTags',
                    ),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'       => 10,
                            'max'       => 255,
                        ),
                    ),
                ),
            ));
    }
}