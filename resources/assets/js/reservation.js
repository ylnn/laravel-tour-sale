window.Vue = require('vue');

window.axios = require('axios');

Vue.component('reservation-form-component', require('./components/ReservationFormComponent.vue'));

const app = new Vue({
    el: '#reservation',
});
