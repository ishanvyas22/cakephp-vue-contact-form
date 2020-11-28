<?php
declare(strict_types=1);

namespace App\Form;

use App\Form\BaseForm;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends BaseForm
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
            ->email('email')
            ->notEmptyString('company_name', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === '2';
            })
            ->notEmptyString('company_size', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === '2';
            })
            ->notEmptyString('industry', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === '2';
            })
            ->notEmptyString('region', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === '2';
            });

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
