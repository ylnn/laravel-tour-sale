@extends('layout.front')


@section('content')
    <div class="row">
        <div class="col-9">
            <h1>Yeni ilan</h1> 
            <div class="alert alert-info" role="alert">
                Lütfen aşağıdaki alanları dikkatlice doldurunuz.
            </div>

            <form>
                <div class="ilan-new-title">İletişim Bilgileriniz</div>

                <div class="ilan-fields">
                    <div class="form-group">
                      <label for="owner">Yayınlayan hesap </label>
                      <input type="text" name="owner" id="owner" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="owner">İlgili kişi (Ad Soyad) </label>
                      <input type="text" name="owner" id="owner" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="owner">E-posta</label>
                      <input type="text" name="owner" id="owner" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="owner">Telefon</label>
                      <input type="text" name="owner" id="owner" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="city">Şehir</label>
                      <select class="form-control" name="city" id="city">
                        <option>Milan</option>
                        <option>Floransa</option>
                        <option>Napoli</option>
                      </select>
                    </div>
                </div>

                <div class="ilan-new-title">İletişim Bilgileriniz</div>

                <div class="ilan-fields">
                    
                    <div class="form-group">
                      <label for="title">İlan başlığı</label>
                      <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="category">Kategori</label>
                      <select class="form-control" name="category" id="category">
                        <option>Otomobil</option>
                        <option>Motosiklet</option>
                        <option>Kitap</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="photos-label">İlan fotoğrafları</label>
                        <div class="photos">
                            <div class="row">
                               <div class="col-5 mx-auto ">
                                   <span class="btn btn-primary"><i class="fa fa-file-photo-o" aria-hidden="true"></i>  Seçin                                                            
                                       <input id="photosinput" name="photos" multiple="multiple" type="file">
                                   </span>
                                </div> 
                            </div>
                            <div class="row py-2 pt-3">
                                <div class="col">
                                    <div class="text-center">
                                        <img src="holder.js/100x100" alt="">
                                        <img src="holder.js/100x100" alt="">
                                        <img src="holder.js/100x100" alt="">
                                        <img src="holder.js/100x100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <div class="ilan-detail-right">
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="submit"></label>
                        <div class="ilan-detail-right">
                            <button type="submit" class="btn btn-success">İlanı yayınla</button>
                        </div>
                    </div>

                </div>

                
                
            </form>


        </div> <!-- content end -->
        @include('front.includes.sidebar')
    </div>
@endsection