@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        <h1>İtalya'da yaşam</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Forumlar</a></li>
                <li class="breadcrumb-item active" aria-current="page">İtalya'da yaşam</li>
            </ol>
        </nav>

        <div class="forum">
            <div class="forum-showing"> 3 yazı görüntüleniyor - 1 ile 3 arası (toplam 3) </div>

            <div class="forum-subject-header">
                <div class="row">
                    <div class="col-2">Yazar</div>
                    <div class="col">Yazılar</div>
                    <div class="col-2 text-right">Beğen</div>
                </div>
            </div>

            {{--  answers start  --}}

            <div class="forum-answer">
                <div class="forum-answer-info">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">18 Şubat 2018 20:39</div>
                        <div class="col-3 text-right">#303</div>
                    </div>
                </div>

                <div class="row forum-answer-row">
                    <div class="col-2 text-center forum-answer-user">
                        <img src="holder.js/80x80" alt="">
                        <div class="forum-answer-username">Yalın Çobanoğlu</div>
                        <span class="font-italic">Katılımcı</span>
                    </div>
                    <div class="col forum-answer-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam sed quas porro deleniti quaerat quisquam reprehenderit eveniet tempore suscipit atque?
                    </div>
                </div>
            </div>
            
            {{--  end  --}}
            <div class="forum-showing"> 3 yazı görüntüleniyor - 1 ile 3 arası (toplam 3) </div>


            <div class="post-answer">

                <h2 class="post-answer-title">Cevap yaz</h2>
                <div class="row">
                    <div class="col-8">
                        <p>Bu konuya cevap yazabilirsiniz.</p>
                        <div class="alert alert-info" role="alert">
                            <strong>Cevap gönderebilmek için giriş yapmalısınız.</strong>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="ilan-detail-right">
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Gönder</button>
                </form>
            </div>

        </div>
        
        </div>
    @include('front.includes.sidebar')
        </div>
@endsection