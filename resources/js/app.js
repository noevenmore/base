/*
require('./bootstrap');
require('alpinejs');
*/

import Vue from 'vue'
Vue.component('image-loader', require('./vue/ImageLoader.vue').default);

const app = new Vue({
  el: '#app',
});