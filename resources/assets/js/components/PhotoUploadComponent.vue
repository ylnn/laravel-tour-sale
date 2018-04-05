<template>
        <div>
        <hr />
            <form :action="url" method="POST" enctype="multipart/form-data" v-on:submit.prevent="onSubmit">

            

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                    
                            <input type="file" id="photos" name="photos" class="form-control" v-on:change="newFile" multiple>
            
                        </div>
                </div>
                <div class="col-md-4">
            
                <div class="form-group">

                    <button type="submit" class="btn btn-default"><i class="fa fa-upload"></i> Yükle</button>

                </div>
            
                </div>
            </div>

            </form>
            
            <div class="row">
                <div class="col-md-12">
                <div v-text="message"></div>
                </div>
            </div>
            
            <hr />

            <button v-on:click="getir" class="btn btn-info"><i class="fa fa-refresh"></i> Yenile</button>

            <ul class="photo-list">
                <li v-for="photo in photos" v-bind:key="photo.id">
                    <img class="img img-responsive" :src="'/storage/entry_images_thumbs/' + photo.thumb_filename" />
                    <button class="btn btn-sm btn-danger" v-on:click="onDelete(photo.id)">Sil</button>
                </li>
            </ul>
        </div>

    </template>

    <script>
        export default {

            props: ['url', 'record_id'],

            data() {
                return {
                    'page_id' : this.record_id,
                    'uploadPhotos' : '',
                    'message': 'Lütfen fotoğraf seçin.',
                    'photos': [],
                }
            },

            methods: {
                getPhotos: function () {
                    axios.get('/admin/pages/get_photos_json/' + this.page_id)
                        .then(function (response) {
                            console.log('get photo başarılı');
                            this.photos = response.data;
                        }.bind(this))
                        .catch(function (error) {
                            console.log('get photo hatalı');
                        });
                },


            post: function () {

                let length = this.uploadPhotos.length;

                console.log('Length: ' + length);

                if(length == 0) {

                    this.setMessage('Önce fotoğraf seçmelisiniz!')

                } else {

                    this.setMessage('Yükleniyor...')

                }

                for (photo of this.uploadPhotos){

                    let data = new FormData();
                    data.set('page_id', this.page_id);
                    data.set('photos', photo);

                    axios.post('/admin/pages/photo_upload', data)
                        .then(function(response){
                            console.log('upload başarılı');
                            this.setMessage('Yüklendi.')

                            this.getir();
                        }.bind(this))
                        .catch(function (error) {
                            console.log('upload hata');
                            this.setMessage('Hata oluştu...')

                        });

                }

            },

            getir: function () {

                this.getPhotos();

            },


            onSubmit: function () {

                this.post();

            },

            onDelete: function (photoid) {

                axios.post('/admin/pages/photo/delete', {'id': photoid})
                    .then(function(response){
                        console.log('delete başarılı');
                        this.setMessage('Silindi.')

                        this.getir();
                    }.bind(this))
                    .catch(function (error) {
                        this.setMessage('Silinirken hata oluştu...')
                        console.log('delete hata');
                    });
            },


            newFile(event) {
                let files = event.target.files;
                if (files.length) this.uploadPhotos = files;
            },

            setMessage(message){

                this.message = message;

            }


            },

            mounted() {
                console.log('Component mounted.')
            },


    }
</script>
