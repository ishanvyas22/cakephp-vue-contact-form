<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="contact form content">
            <?= $this->Form->create(null) ?>
            <fieldset>
                <p>My question is related to:</p>
                <?php
                echo $this->Form->radio('type', [
                    '1' => 'Customer Support',
                    '2' => 'Sales',
                ], ['value' => '1']);
                ?>

                <div class="contact-support">
                    <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message', ['type' => 'textarea', 'rows' => '10', 'cols' => '5']);
                    ?>
                </div>

                <div class="sales">
                    <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('message', ['type' => 'textarea', 'rows' => '10', 'cols' => '5']);
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('company_size', [
                        'type' => 'select',
                        'options' => [
                            '1' => '1',
                            '2' => '2-9',
                            '3' => '10-19',
                            '4' => '20+',
                        ],
                        'empty' => 'Please Select',
                    ]);
                    echo $this->Form->control('industry', [
                        'type' => 'select',
                        'options' => [
                            '1' => 'Renovation',
                            '2' => 'Inspection',
                            '3' => 'Other',
                        ],
                        'empty' => 'Please Select',
                    ]);
                    echo $this->Form->control('region', [
                        'type' => 'select',
                        'options' => [
                            '1' => 'North-America',
                            '2' => 'Europe',
                            '3' => 'Asia',
                            '4' => 'Other',
                        ],
                        'empty' => 'Please Select',
                    ]);
                    ?>
                </div>

                <p class="txt-dark-gray">
                    This site is protected by reCAPTCHA and Google <strong>Privacy Policy</strong> and <strong>Terms of Service</strong> apply.
                </p>
            </fieldset>

            <?= $this->Form->button(__('Contact us'), ['class' => 'btn-blue']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
