<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm;
use Application\Form\ContactFormFilter;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;

class ContactController extends AbstractActionController
{
    public function indexAction()
    {
        $viewData = array();

        $viewData['title'] = 'Contact | eeCentre.ro';
        $viewData['successful'] = '';

        $form = new ContactForm();
        $form->setInputFilter(new ContactFormFilter());

        if ($this->getRequest()->isPost())
        {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid())
            {
                $viewData['successful'] = 'Message was sent successful! Thank you for your message!';

                $message = new Message();

                $message->addFrom($form->getInputFilter()->getValue('email'), $form->getInputFilter()->getValue('name'))
                        ->addTo('mihai.grama@ymail.com', 'Mihai Grama')
                        ->setSubject("Sending an email from contact form")
                        ->setBody($form->getInputFilter()->getValue('message'));

                $transport = new SendmailTransport();
                $transport->send($message);
            }
        }
        $viewData['form'] = $form;
        return new ViewModel($viewData);
    }
}
