
require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';

Vue.use(VueRouter);
Vue.use({
install: function(Vue, options){
    Vue.prototype.$jQuery = require('jquery'); // you'll have this.$jQuery anywhere in your vue project
    }
});
Vue.component('menu-index', require('./components/menu/Index.vue').default);
Vue.component('menu-category', require('./components/menu/Category.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes:routes
});

const app = new Vue({
    el: '#app',
    router: router
});

