import Vue from 'vue';
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

const CUSTOMER_SUPPORT = '1';

const app = new Vue({
    el: '#contact',
    data: {
        type: CUSTOMER_SUPPORT,
    },
    methods: {
        submitForm() {
            console.log('Submitting...');
        }
    }
});
