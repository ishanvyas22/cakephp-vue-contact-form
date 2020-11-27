<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactForm;

/**
 * Contact Controller
 */
class ContactController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contact = new ContactForm();

        if ($this->getRequest()->is('post')) {
            debug($this->getRequest()->getData());exit;
            if ($contact->execute($this->getRequest()->getData())) {
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }

        $this->set('contact', $contact);
    }
}
