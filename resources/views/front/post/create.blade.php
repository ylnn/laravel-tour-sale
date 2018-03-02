@extends('layout.front')



@section('content')

    <div class="row">
        <div class="col-9">
            <h1 class="display-5">Yazı gönder</h1>


            <form action="" method="post">
                <div class="form-group">
                  <label for="title">Başlık:</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Yazınızın başlığını girin">
                </div>

                <div class="form-group">
                  <label for="">Yazınız:</label>
                  <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Yazınızı buraya yapıştırın."></textarea>
                </div>

                <div class="form-group">
                  <label for="">Fotoğraf:</label>
                  <input type="file" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Yazınıza eklemek istediğiniz fotoğrafı seçin. (tavsiye ederiz)</small>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-send-o" aria-hidden="true"></i> Yazıyı gönder</button>
            </form>
        </div>

            @include('front.includes.sidebar')
    </div>

@endsection