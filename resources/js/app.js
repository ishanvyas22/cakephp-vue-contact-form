import Vue from 'vue';
import axios from 'axios';
import Errors from './helpers/FormErrors.js';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

Vue.use(VueSweetalert2);

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
