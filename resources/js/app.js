/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vuex from 'vuex'
import storeVuex from  './store/index'
Vue.use(require('vue-moment'));
Vue.use(Vuex)

import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);


const store = new Vuex.Store(storeVuex)


Vue.component('main-app', require('./components/MainApp.vue').default);
Vue.component('major-app', require('./components/MajorApp.vue').default);


const app = new Vue({
    el: '#app2',
    store
});

