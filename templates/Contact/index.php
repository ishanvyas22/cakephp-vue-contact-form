<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;
?>

<div class="message error" v-show="flashMessage !== ''" v-text="flashMessage" onclick="this.classList.add('hidden');"></div>

<div class="row">
    <div class="column-responsive column-80">
        <div class="contact form content">
            <?php
            echo $this->Form->create($contact, [
                'id' => 'contact',
                'novalidate' => true,
                '@submit.prevent' => 'submitForm',
                '@keydown' => 'errors.clear($event.target.name)',
                '@change' => 'errors.clear($event.target.name)',
            ]);
            ?>
            <fieldset>
                <p>My question is related to:</p>
                <?php
                echo $this->Form->radio(
                    'contact_type',
                    Configure::read('Contact.types'),
                    [
                        'v-model' => 'form.contact_type',
                    ]
                );
                ?>

                <?php
                echo $this->Form->control('firstname', [
                    'v-model' => 'form.firstname',
                ]);
                ?>
                <div v-show="errors.has('firstname')" class="error-message" v-text="errors.get('firstname')"></div>

                <?php
                echo $this->Form->control('lastname', [
                    'v-model' => 'form.lastname',
                ]);
                ?>
                <div v-show="errors.has('lastname')" class="error-message" v-text="errors.get('lastname')"></div>

                <?php
                echo $this->Form->control('email', [
                    'v-model' => 'form.email',
                ]);
                ?>
                <div v-show="errors.has('email')" class="error-message" v-text="errors.get('email')"></div>

                <?php
                echo $this->Form->control('message', [
                    'type' => 'textarea',
                    'rows' => '10',
                    'cols' => '5',
                    'v-model' => 'form.message',
                ]);
                ?>
                <div v-show="errors.has('message')" class="error-message" v-text="errors.get('message')"></div>

                <div class="sales" v-if="form.contact_type === '<?= CONTACT_TYPE_SALES ?>'">
                    <?php
                    echo $this->Form->control('company_name', [
                        'v-model' => 'form.company_name',
                    ]);
                    ?>
                    <div v-show="errors.has('company_name')" class="error-message" v-text="errors.get('company_name')"></div>

                    <?php
                    echo $this->Form->control('company_size', [
                        'type' => 'select',
                        'options' => Configure::read('Contact.company_size'),
                        'empty' => __('Please Select'),
                        'v-model' => 'form.company_size',
                    ]);
                    ?>
                    <div v-show="errors.has('company_size')" class="error-message" v-text="errors.get('company_size')"></div>

                    <?php
                    echo $this->Form->control('industry', [
                        'type' => 'select',
                        'options' => Configure::read('Contact.industry'),
                        'empty' => __('Please Select'),
                        'v-model' => 'form.industry',
                    ]);
                    ?>
                    <div v-show="errors.has('industry')" class="error-message" v-text="errors.get('industry')"></div>

                    <?php
                    echo $this->Form->control('region', [
                        'type' => 'select',
                        'options' => Configure::read('Contact.region'),
                        'empty' => __('Please Select'),
                        'v-model' => 'form.region',
                    ]);
                    ?>
                    <div v-show="errors.has('region')" class="error-message" v-text="errors.get('region')"></div>

                    <?php
                    echo $this->Form->control('phone', [
                        'label' => 'Phone (optional)',
                        'v-model' => 'form.phone',
                    ]);
                    ?>
                    <div v-show="errors.has('phone')" class="error-message" v-text="errors.get('phone')"></div>
                </div>

                <p class="txt-dark-gray">
                    This site is protected by reCAPTCHA and Google <strong>Privacy Policy</strong> and <strong>Terms of Service</strong> apply.
                </p>
            </fieldset>

            <?= $this->Form->button(__('Contact us'), ['class' => 'btn-primary btn-large']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
