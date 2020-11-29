<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Core\Configure;
use Cake\Form\Schema;
use Cake\Http\Client;
use Cake\Mailer\Mailer;
use Cake\Validation\Validator;
use Throwable;

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
            ->addField('region', ['type' => 'select'])
            ->addField('phone', ['type' => 'string']);
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
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === CONTACT_TYPE_SALES;
            })
            ->notEmptyString('company_size', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === CONTACT_TYPE_SALES;
            })
            ->notEmptyString('industry', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === CONTACT_TYPE_SALES;
            })
            ->notEmptyString('region', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === CONTACT_TYPE_SALES;
            })
            ->notEmptyString('region', null, function ($context) {
                return isset($context['data']['contact_type']) && $context['data']['contact_type'] === CONTACT_TYPE_SALES;
            })
            ->add('phone', 'custom', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match("/^\+[0-9]+$/", $value);
                },
                'message' => __('Please enter a valid phone number.'),
                'on' => function ($context) {
                    return !empty($context['data']['phone']);
                },
            ]);

        return $validator;
    }

    /**
     * @inheritDoc
     */
    protected function _execute(array $data): bool
    {
        if ($data['contact_type'] === CONTACT_TYPE_SUPPORT) {
            $this->sendEmail($data);
        } elseif ($data['contact_type'] === CONTACT_TYPE_SALES) {
            $this->makeRequest($data);
        }

        return true;
    }

    /**
     * Send email to the customer support team.
     *
     * @param array $data Data to use when sending the email.
     * @return array
     */
    private function sendEmail(array $data)
    {
        $mailer = new Mailer('default');

        return $mailer->setTo(Configure::read('SendMail.to'))
            ->setSubject("{$data['firstname']} {$data['lastname']} needs some help")
            ->deliver(sprintf('Their message is "%s", contact them at %s.', $data['message'], $data['email']));
    }

    /**
     * Make an API request to send sales data.
     *
     * @param array $data Data to send.
     * @return \Cake\Http\Client\Response|null
     */
    private function makeRequest(array $data)
    {
        $response = null;
        $http = new Client();

        try {
            $response = $http->post(
                Configure::read('Endpoints.sales'),
                $data,
                ['headers' => ['charset' => 'utf-8']]
            );
        } catch (Throwable $th) {
            // Handle exception
        }

        return $response;
    }
}
