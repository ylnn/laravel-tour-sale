@extends('layout.front')



@section('content')

    <div class="row">
        <div class="col-9">
            <h1 class="display-5">Yazı Detayı vs.</h1>
            <div class="post-info">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        28.02.2018
                    </div>
                    <div class="col">
                        <i class="fa fa-user" aria-hidden="true"></i> Murat Çetin
                    </div>
                </div>
            </div>

            <img src="holder.js/730x500" alt="">
            <hr>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit libero eos consectetur dignissimos facere numquam. Esse voluptatum eius quia suscipit asperiores nulla hic. Perspiciatis labore placeat quasi beatae atque omnis, doloribus cupiditate ducimus eligendi facilis. Accusamus vitae, facere doloribus minima est fuga! Corrupti rem minima officia aliquid nemo nesciunt et ullam est exercitationem consequuntur? Ex architecto perferendis est beatae fugit hic odit minima voluptate autem, doloribus totam. Voluptatibus, totam quidem.
            </p>

            
        </div>

            @include('front.includes.sidebar')
    </div>

@endsection