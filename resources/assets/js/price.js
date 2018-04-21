window.Vue = require('vue');

window.axios = require('axios');

Vue.component('price-component', require('./components/PriceComponent.vue'));

const app = new Vue({
    el: '#price',
});
