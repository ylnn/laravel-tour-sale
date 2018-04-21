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

                        <div class="form-group" v-for="a in adult" v-bind:key="a">
                            <label for="p1">Katılımcı {{a}}</label>
                            <input type="text" class="form-control" name="p1">
                        </div>
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
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
