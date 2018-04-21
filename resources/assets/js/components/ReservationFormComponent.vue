<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Reservation Form</h3>
                <div class="card card-default">
                    <div class="card-header">Please fill the form</div>

                    <div class="card-body">
                        
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

                        <hr>
                        <h2>Katılımcılar:</h2>

                        <div class="form-group" v-for="(item, index) in participants" v-bind:key="index">
                            <label for="p1">Katılımcı </label>
                            <input type="text" class="form-control" name="p1" v-model="participants[index].name">
                        </div>
                        <p>Katılımcı sayısı {{partCounts}}</p>
                        <p>Date ID: {{date_id}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props : ['date_id'],

        data() {
            return {
                'adult' : 1,
                'participants': [
                    {
                        'gender' : 'mr', 
                        'name' : 'name', 
                    },
                ]
            }
        },

        computed: {
            partCounts: function () {
                return this.participants.length;
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            changeAdultCount
        }
    }
</script>
