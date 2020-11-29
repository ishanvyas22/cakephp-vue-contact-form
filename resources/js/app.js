import Vue from 'vue';
import axios from 'axios';
import Errors from './helpers/FormErrors.js';
import VueSweetalert2 from 'vue-sweetalert2';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

Vue.use(VueSweetalert2);

const CUSTOMER_SUPPORT = 'Support';

const app = new Vue({
    el: '#main',
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
        flashMessage: '',
    },
    methods: {
        submitForm() {
            this.flashMessage = '';

            axios.post('/contact', this.form, {
                headers: {
                    'X-CSRF-Token': window.csrfToken,
                }
            }).then(response => {
                if (response.data.success) {
                    this.$swal(
                        '',
                        response.data.message,
                        'success'
                    );

                    this.resetForm();
                }
            }).catch(error => {
                this.errors.add(error.response.data.errors);

                this.flashMessage = error.response.data.message;
            });
        },
        resetForm() {
            var self = this;

            Object.keys(this.form).forEach(function(key, index) {
                if (key === 'contact_type') {
                    self.form[key] = CUSTOMER_SUPPORT;
                } else {
                    self.form[key] = '';
                }
            });
        }
    }
});
