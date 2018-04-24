<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Reservation Form</h3>
                <div class="card card-default">
                    <div class="card-header">Please fill the form</div>

                    <div class="card-body">
                        
                        <h2>Katılımcılar:</h2>

                        <div class="form-group" v-for="(item, index) in participants" v-bind:key="index">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="mr">Mr.</option>
                                        <option value="mrs">Mrs.</option>
                                        <option value="miss">Ms.</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="p1" v-model="participants[index].name">
                                </div>
                            </div>
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

        props : ['date_id', 'adult'],

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

    }
</script>
