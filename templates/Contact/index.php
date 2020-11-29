<?php
/**
 * @var \App\View\AppView $this
 */
?>
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
                    [
                        '1' => 'Customer Support',
                        '2' => 'Sales',
                    ],
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

                <div class="sales" v-if="form.contact_type === '2'">
                    <?php
                    echo $this->Form->control('company_name', [
                        'v-model' => 'form.company_name',
                    ]);
                    ?>
                    <div v-show="errors.has('company_name')" class="error-message" v-text="errors.get('company_name')"></div>

                    <?php
                    echo $this->Form->control('company_size', [
                        'type' => 'select',
                        'options' => [
                            '1' => '1',
                            '2' => '2-9',
                            '3' => '10-19',
                            '4' => '20+',
                        ],
                        'empty' => 'Please Select',
                        'v-model' => 'form.company_size',
                    ]);
                    ?>
                    <div v-show="errors.has('company_size')" class="error-message" v-text="errors.get('company_size')"></div>

                    <?php
                    echo $this->Form->control('industry', [
                        'type' => 'select',
                        'options' => [
                            '1' => 'Renovation',
                            '2' => 'Inspection',
                            '3' => 'Other',
                        ],
                        'empty' => 'Please Select',
                        'v-model' => 'form.industry',
                    ]);
                    ?>
                    <div v-show="errors.has('industry')" class="error-message" v-text="errors.get('industry')"></div>

                    <?php
                    echo $this->Form->control('region', [
                        'type' => 'select',
                        'options' => [
                            '1' => 'North-America',
                            '2' => 'Europe',
                            '3' => 'Asia',
                            '4' => 'Other',
                        ],
                        'empty' => 'Please Select',
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
