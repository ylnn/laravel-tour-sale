<template>
    
    <div>

                        <div class="form-group">
                            <label for="adult">{{pax_count_string}}</label>
                            <select name="adult" id="adult" class="form-control" v-model.number="adult">
                                <option value="1">1 {{adult_string}}</option>
                                <option value="2">2 {{adult_string}}</option>
                                <option value="3">3 {{adult_string}}</option>
                                <option value="4">4 {{adult_string}}</option>
                                <option value="5">5 {{adult_string}}</option>
                            </select>
                        </div>

                        <p>{{total_price_string}}: {{currency}} <b>{{totalPrice}}</b></p>

                    <div style="padding-top:20px;">
                        <button class="btn btn-success btn-lg" v-on:click="redirectToStep2">{{continue_string}}</button>
                    </div>
    </div>
</template>

<script>
    export default {

        props : [
            'date_id', 
            'price', 
            'currency', 
            'step2_url',
            'total_price_string',
            'continue_string',
            'pax_count_string',
            'adult_string',
            ],

        data() {
            return {
                'adult' : 1,
            }
        },

        methods: {
            redirectToStep2: function () {
                window.location.href = this.step2_url + '/' + this.date_id + '/' + this.adult;
            }
        },

        computed: {
            totalPrice: function () {
                return this.adult * this.price;
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

    }
</script>
