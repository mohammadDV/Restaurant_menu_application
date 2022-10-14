
require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';
import Paginate from 'vuejs-paginate'


Vue.use(VueRouter);
Vue.use({
install: function(Vue, options){
    Vue.prototype.$jQuery = require('jquery'); // you'll have this.$jQuery anywhere in your vue project
    }
});
Vue.component('success-alert',  require('./components/menu/SuccessAlert.vue').default);
Vue.component('modal',          require('./components/menu/Modal.vue').default);
Vue.component('menu-index',     require('./components/menu/Index.vue').default);
Vue.component('menu-category',  require('./components/menu/Category.vue').default);
Vue.component('manage-index',   require('./components/manage/Index.vue').default);
Vue.component('manage-index',   require('./components/manage/Index.vue').default);
Vue.component('paginate', Paginate)

const router = new VueRouter({
    mode: 'history',
    routes:routes
});

const app = new Vue({
    el: '#app',
    router: router,
    data : {
        modalShow: false,
        orders: [],
    },
    created() {
        this.setLocal()
    },
    methods: {
        openModal(id) {
            this.food_id   = id
            this.modalShow = true;
        },
        closeModal() {
            this.modalShow = false;
        },
        addOrder(order) {
            this.orders.push(order);
            localStorage.setItem("orders",JSON.stringify(this.orders));
        },
        setOrder(order) {
            this.orders = order;
            localStorage.setItem("orders",JSON.stringify(this.orders));
        },
        removeOrder() {
            this.orders = [];
            localStorage.setItem("orders",JSON.stringify([]));
        },
        setLocal() {
            if (localStorage.getItem("orders") != undefined) {
                this.orders = JSON.parse(localStorage.getItem("orders"));
            }
        }
    }
});

