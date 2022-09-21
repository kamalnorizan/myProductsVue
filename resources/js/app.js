import './bootstrap';
import Vue from 'vue/dist/vue'
window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

const router = VueRouter(

);

const app = new Vue({
    el: '#app',
    router: router
});
