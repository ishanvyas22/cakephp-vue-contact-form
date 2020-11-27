<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{
    /**
     * @inheritDoc
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('contact_type', 'radio')
            ->addField('firstname', ['type' => 'string'])
            ->addField('lastname', ['type' => 'string'])
            ->addField('email', ['type' => 'string'])
            ->addField('message', ['type' => 'text'])
            ->addField('company_name', ['type' => 'string'])
            ->addField('company_size', ['type' => 'select'])
            ->addField('industry', ['type' => 'select'])
            ->addField('region', ['type' => 'select']);
    }

    /**
     * Validate form.
     *
     * @param \Cake\Validation\Validator $validator The Validation object.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('contact_type')
            ->notEmptyString('firstname')
            ->notEmptyString('lastname')
            ->notEmptyString('message')
            ->notEmptyString('email')
            ->email('email');

        return $validator;
    }

    /**
     * @inheritDoc
     */
    protected function _execute(array $data): bool
    {
        // Send an email.
        debug($data);

        return true;
    }
}
