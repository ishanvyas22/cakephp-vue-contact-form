<?php
declare(strict_types=1);

namespace App\Controller;

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
        $contact = $this->paginate($this->Contact);

        $this->set(compact('contact'));
    }
}
