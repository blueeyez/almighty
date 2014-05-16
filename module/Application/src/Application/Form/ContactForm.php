<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;


class ContactForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('contactForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
                'name' => 'name',
                'type' => 'Zend\Form\Element\Text',
                'options' => array(
                    'label' => 'Your name',
                ),
                'attributes' => array(
                    'placeholder' => 'Jane Smith'
                ),
            ));

        $this->add(array(
                'type' => 'Zend\Form\Element\Email',
                'name' => 'email',
                'options' => array(
                    'label' => 'Your email',
                ),
                'attributes' => array(
                    'placeholder' => 'jane@smithco.com'
                ),
            ));

        $this->add(array(
                'type' => 'Zend\Form\Element\Textarea',
                'name' => 'message',
                'options' => array(
                    'label' => 'Message',
                ),
                'attributes' => array(
                    'style' => 'height: auto !important;',
                    'rows' => '10',
                ),
            ));
        $this->add(array(
                'name' => 'submit',
                'type'  => 'Zend\Form\Element\Submit',
                'attributes' => array(
                    'value' => 'Submit',
                    'class' => 'radius button',
                ),
            ));
    }
}