@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Kullanıcı Görüşleri</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kullanıcı Görüşleri</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-inner" style="background-image: url(images/background/bg1.png);     margin: 10px 0;">
        <div class="container">
            <div class="row">

                @foreach ( $reviews as $review)
                    <div class="review-item col-12 col-md-6 col-lg-4 mb-4">
                        <div class="wo-appreciation">
                            <blockquote><q>{!! $review->content !!}</q></blockquote>
                            <div class="wo-appreciation__user">
                                <span style="font-size: 12px"><i class="fad fa-history me-1"></i> {{date('d-m-Y',strtotime($review->created_at))}}</span>
                                <h3 class="mt-1"><a href="javascript:;" class="text-decoration-none"><i class="fad fa-user me-1"></i>  {{$review->firstname}}  {{$review->lasstname}}</a></h3>
                            </div>
                            <img src="{{asset('web/img/review-icon.png')}}" class="wo-appreciationicon" alt="img description">
                        </div>
                    </div>
                @endforeach

                <!-- div class="col-12">
                    <nav class="wo-pagination mt-5">
                        $paginationLinks
                    </nav>
                </div -->

            </div>
        </div>
    </div>
@endsection


@section('body-after-js')
    <script type="text/javascript">
        $(function(){

            $("form#Review").on("submit", function(e){
                e.preventDefault();
                var data = $(this).serializeObject();
                $.post("/kullanici_gorusleri", data, function(r){
                    if( r.status == "success" ){
                        $("form#Review")[0].reset();
                        $("form#Review").prop("hidden", true);
                        $("#reviewpopup .alert-success").prop("hidden", false);
                    }
                }, "json");

            });

        });
    </script>
@endsection