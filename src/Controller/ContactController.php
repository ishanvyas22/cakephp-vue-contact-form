<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\ContactForm;
use App\Utility\ResponseTrait;

/**
 * Contact Controller
 */
class ContactController extends AppController
{
    use ResponseTrait;

    /**
     * Iniitilization hook.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contact = new ContactForm();

        if ($this->getRequest()->is('post')) {
            if (! $contact->execute($this->getRequest()->getData())) {
                return $this->setJsonResponse([
                    'errors' => $contact->getValidationErrors(),
                    'message' => __('There was a problem submitting your form.'),
                ], 422);
            }

            $this->Flash->success('We will get back to you soon.');
        }

        $this->set('contact', $contact);
    }
}
