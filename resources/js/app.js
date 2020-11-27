import Vue from 'vue';
import axios from 'axios';
import Errors from './helpers/FormErrors.js';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

const CUSTOMER_SUPPORT = '1';

const app = new Vue({
    el: '#contact',
    data: {
        form: {
            contact_type: CUSTOMER_SUPPORT,
            firstname: '',
            lastname: '',
            email: '',
            message: '',
            company_name: '',
            company_size: '',
            industry: '',
            region: '',
        },
        errors: new Errors(),
    },
    methods: {
        submitForm() {
            console.log('Submitting...');
            axios.post('/contact', this.form, {
                headers: {
                    'X-CSRF-Token': window.csrfToken,
                }
            }).then(response => {
                if (response.data.success) {
                    this.$notify({
                        group: 'default',
                        type: 'success',
                        text: response.data.message
                    });

                    // Reset form fields
                }
            }).catch(error => {
                this.$notify({
                    group: 'default',
                    type: 'error',
                    text: error.response.data.message
                });

                this.errors.add(error.response.data.errors);
            });
        }
    }
});
