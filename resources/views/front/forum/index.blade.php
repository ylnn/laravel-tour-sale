@extends('layout.front')


@section('content')
   <div class="row">
       <div class="col-9">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Forumlar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Otomobil</li>
            </ol>
        </nav>
        <h1>Forumlar</h1>
        <table class="table table-striped forum-table">
            <thead>
                <tr class="text-center">
                    <th class="text-left">Forum</th>
                    <th>Konular</th>
                    <th>Yazılar</th>
                    <th>Güncel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">
                        <div class="forum-header">
                            <a href="{{route('forum.detail')}}">Tanışma</a>
                        </div>
                        <div class="forum-desc">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-center">3</td>
                    <td>
                        <div class="text-center">
                            <div class="forum-last-activity">
                                1 gün 3 saat önce
                            </div>
                            <div class="justify-content-center">
                                <div class="forum-sm-image">
                                    <img src="holder.js/20x20" alt="">
                                    <span class="forum-last-name">
                                        Yalın Çobanoğlu
                                    </span>
                                
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="forum-header">
                            Tanışma
                        </div>
                        <div class="forum-desc">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-center">3</td>
                    <td>
                        <div class="text-center">
                            <div class="forum-last-activity">
                                1 gün 3 saat önce
                            </div>
                            <div class="justify-content-center">
                                <div class="forum-sm-image">
                                    <img src="holder.js/20x20" alt="">
                                    <span class="forum-last-name">
                                        Yalın Çobanoğlu
                                    </span>
                                
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="forum-header">
                            Tanışma
                        </div>
                        <div class="forum-desc">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-center">3</td>
                    <td>
                        <div class="text-center">
                            <div class="forum-last-activity">
                                1 gün 3 saat önce
                            </div>
                            <div class="justify-content-center">
                                <div class="forum-sm-image">
                                    <img src="holder.js/20x20" alt="">
                                    <span class="forum-last-name">
                                        Yalın Çobanoğlu
                                    </span>
                                
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="forum-header">
                            Tanışma
                        </div>
                        <div class="forum-desc">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-center">3</td>
                    <td>
                        <div class="text-center">
                            <div class="forum-last-activity">
                                1 gün 3 saat önce
                            </div>
                            <div class="justify-content-center">
                                <div class="forum-sm-image">
                                    <img src="holder.js/20x20" alt="">
                                    <span class="forum-last-name">
                                        Yalın Çobanoğlu
                                    </span>
                                
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="forum-header">
                            Tanışma
                        </div>
                        <div class="forum-desc">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-center">3</td>
                    <td>
                        <div class="text-center">
                            <div class="forum-last-activity">
                                1 gün 3 saat önce
                            </div>
                            <div class="justify-content-center">
                                <div class="forum-sm-image">
                                    <img src="holder.js/20x20" alt="">
                                    <span class="forum-last-name">
                                        Yalın Çobanoğlu
                                    </span>
                                
                            </div>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
       </div>

        @include('front.includes.sidebar')
   </div> 
@endsection