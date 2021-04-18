import Vue from 'vue'
import App from './App.vue';
import VueRouter from "vue-router";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import router from "./src/roues";
import store from './src/store';


Vue.use(VueRouter);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('vue-app', App)
new Vue({
    el: '#app',
    store,
    router
});
