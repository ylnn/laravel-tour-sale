<template>
    
    <div>

                        <div class="form-group">
                            <label for="adult">Kişi sayısı</label>
                            <select name="adult" id="adult" class="form-control" v-model.number="adult">
                                <option value="1">1 Kişi</option>
                                <option value="2">2 Kişi</option>
                                <option value="3">3 Kişi</option>
                                <option value="4">4 Kişi</option>
                                <option value="5">5 Kişi</option>
                            </select>
                        </div>

                        <p>Total Price: {{currency}} <b>{{totalPrice}}</b></p>

                    <div style="padding-top:20px;">
                        <button class="btn btn-success btn-lg" v-on:click="redirectToStep2">Devam Et</button>
                    </div>
    </div>
</template>

<script>
    export default {

        props : ['date_id', 'price', 'currency', 'step2_url'],

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
