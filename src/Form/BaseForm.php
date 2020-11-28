<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Form\Form as CakeForm;

/**
 * Base form class extended from `Cake\Form\Form`.
 */
class BaseForm extends CakeForm
{
    /**
     * Set first error message as error from validations array.
     *
     * @return array
     */
    public function getValidationErrors()
    {
        if (empty($this->getErrors())) {
            return [];
        }

        $validations = [];
        foreach ($this->getErrors() as $field => $errors) {
            if (! is_array($errors)) {
                continue;
            }

            $validations[$field] = array_values($errors)[0];
        }

        return $validations;
    }
}
