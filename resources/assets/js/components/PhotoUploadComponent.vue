<template>
    <div>
        <hr />
        <form :action="url" method="POST" enctype="multipart/form-data" v-on:submit.prevent="onSubmit">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="file" id="photos" name="photos" class="form-control" v-on:change="newFile" multiple ref="fileInput">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                            {{lang.upload}}</button>
                    </div>
                </div>
            </div>

        </form>

        <div class="row">
            <div class="col-md-12">
                <div v-text="message"></div>
                <!-- <div v-text="url"></div> -->
            </div>
        </div>

        <hr />

        <button v-on:click="getir" class="btn btn-info btn-sm">
            {{lang.refresh}}
        </button>

        <ul class="vue-photo-list ">
            <draggable name="drag" v-model="photos" @start="drag=true" @end="drag=false">
                    <li v-for="photo in photos" v-bind:key="photo.id" class="photoitem">
                            <img width="100" class="img img-responsive" :src="url + '/storage/' + photo.filename_thumb" />
                            <button class="btn btn-sm btn-danger" v-on:click="onDelete(photo.id)">X</button>
                    </li>
            </draggable>

        </ul>
    </div>

</template>

    <script>

    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="csrf-token"]').getAttribute('value');

    import draggable from 'vuedraggable';
    export default {

        props: ['url', 'record_id'],

        components: {
            draggable,
        },
        data() {
            return {
                'id': this.record_id,
                'uploadPhotos': '',
                'message': '',
                'photos': [],
                'lang': [],

                //Urls:
                'get_photos_url': '/admin/get_photos_ajax/',
                'upload_post_url': '/admin/upload_photo_ajax',
                'delete_post_url': '/admin/delete_photo_ajax',

                'get_lang_variables_url': '/admin/get_vue_lang',
            }
        },
        methods: {
            getPhotos: function () {
                axios.get(this.url + this.get_photos_url + this.id)
                    .then(function (response) {
                        if(Array.isArray(response.data)){
                            console.log('get success...');
                            this.photos = response.data;
                        }
                    }.bind(this))
                    .catch(function (error) {
                        console.log('get error...');
                    });
            },


            post: function () {

                let length = this.uploadPhotos.length;

                console.log('Length: ' + length);

                if (length == 0) {

                    this.setMessage(this.lang['once-select-photo'])

                } else {

                    this.setMessage(this.lang['uploading'])

                }

                for (var photo of this.uploadPhotos) {

                    let data = new FormData();
                    data.set('id', this.id);
                    data.set('photo', photo);

                    axios.post(this.url + this.upload_post_url, data)
                        .then(function (response) {
                            this.setMessage(this.lang['uploaded'])
                            this.getir();
                        }.bind(this))
                        .catch(function (error) {
                            this.setMessage(this.lang['error-occurred'])
                        }.bind(this));

                }


                // clear file input selected images...
                this.$refs.fileInput.value = null;

            },

            getir: function () {

                this.getPhotos();

            },


            onSubmit: function () {

                this.post();

            },

            onDelete: function (photoid) {

                axios.post(this.url + this.delete_post_url, {
                        'content_id': this.id, // content id
                        'id': photoid // photo id for deleting
                    })
                    .then(function (response) {
                        console.log('delete success...');
                        this.setMessage(this.lang.deleted);

                        this.getir();
                    }.bind(this))
                    .catch(function (error) {
                        // this.setMessage('Silinirken hata oluştu...')
                        this.setMessage(this.lang.error-occurred);
                        console.log('delete hata');
                    });
            },

            getLang: function () {
                axios.get(this.url + this.get_lang_variables_url)
                    .then(function (response) {
                        console.log('get lang success...');
                        this.lang = response.data;
                    }.bind(this))
                    .catch(function (error) {
                        console.log('get lang error...');
                    });
            },

            newFile(event) {
                console.log('...');
                let files = event.target.files;
                if (files.length) this.uploadPhotos = files;
            },

            setMessage(message) {

                this.message = message;

            }


        },

        mounted() {
            console.log('Component mounted.')
        },

        created() {
            this.getLang();
            this.getPhotos();
        }


    }
</script>
