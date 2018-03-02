@extends('layout.front')

@section('content')
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-5">italya.org </h1>
        <p class="lead my-3">italya.org bilgi paylaşımı amacı ile oluşturulmuş, forumlar, yazılar ve ilanlar bulunan çok yönlü bir sitedir.</p>
        {{--  <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">başla...</a></p>  --}}
    </div>
</div>

<div class="row main-headings" style="padding-top: 50px;">

    <div class="col-lg-4" style="text-align: center;">
        <a href="https://www.italya.org/forumlar/">
                             <img src="https://www.italya.org/wp-content/uploads/2018/02/forumlar-150x150.jpeg" class="rounded-circle" alt="" width="150" height="150">                            </a>
        <h2><a href="https://www.italya.org/forumlar/">Forumlar</a></h2>
        <p>İtalya ile ilgili insanlara ulaşabileceğiniz ve bilgilerinizi paylaşabileceğiniz Türkçe forum.</p>
        <p><a class="btn btn-secondary" href="https://www.italya.org/forumlar/" role="button">Forum'a git</a></p>
    </div>
    <div class="col-lg-4" style="text-align: center;">
        <a href="https://www.italya.org/tum-ilanlar/">
                             <img src="https://www.italya.org/wp-content/uploads/2018/02/ilanlar-150x150.jpg" class="rounded-circle" alt="" width="150" height="150">                            </a>
        <h2><a href="https://www.italya.org/tum-ilanlar/">İlanlar</a></h2>
        <p>italya.org'daki ilan sayfaları aracılığıyla ilanlar verebilir, aradığınızı da kolayca bulabilirsiniz.</p>
        <p><a class="btn btn-secondary" href="https://www.italya.org/tum-ilanlar/" role="button">İlanlara git</a></p>
    </div>
    <div class="col-lg-4" style="text-align: center;">
        <a href="https://www.italya.org/yazilar/">
                             <img src="https://www.italya.org/wp-content/uploads/2018/02/italy-150x150.jpeg" class="rounded-circle" alt="" width="150" height="150">                            </a>
        <h2><a href="https://www.italya.org/yazilar/">Yazılar</a></h2>
        <p>Deneyimlerinizi herkesle paylaşın! Yayınlanmasını istediğiniz yazınızı bize göndermeniz yeterli.</p>
        <p><a class="btn btn-secondary" href="https://www.italya.org/yazilar/" role="button">Yazılara git</a></p>
    </div>

</div>
@endsection