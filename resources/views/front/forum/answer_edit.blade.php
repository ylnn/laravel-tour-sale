@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        <h1>Cevabımı Düzenle</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Forumlar</a></li>
                <li class="breadcrumb-item active" aria-current="page">İtalya'da yaşam</li>
            </ol>
        </nav>
        
        <form action="" method="post">
            <div class="form-group">
                <div class="ilan-detail-right">
                    <textarea id="summernote" name="editordata"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-dark"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Güncelle</button>
        </form>

        </div>
    @include('front.includes.sidebar')
        </div>
@endsection