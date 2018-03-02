@extends('layout.front')

@section('content')
    <div class="row">

        <div class="col-md-9 blog-main">
          <h3 class="pb-3 mb-4 border-bottom">
            Blog Yazıları
            <a name="" id="" class="btn btn-dark" href="{{route('post.create')}}" role="button">Yazı Gönder <i class="fa fa-share-square-o" aria-hidden="true"></i></a>
          </h3>
          

          <div class="blog-post">
            <h2 class="blog-post-title">Sample blog post</h2>
            <p class="blog-post-meta">29.02.2018 | gönderen: <a href="#">Mehmet Çetin</a></p>

            <img src="holder.js/730x400?theme=thumb" alt="">
            <hr>

            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Önceki</a>
            <a class="btn btn-outline-secondary disabled" href="#">Sonraki</a>
          </nav>

        </div>
            @include('front.includes.sidebar')
    </div>
@endsection