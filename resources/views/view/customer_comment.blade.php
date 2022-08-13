
@extends('layouts.view')
@section('content')

    <div class="dlab-bnr-inr overlay-primary-dark" style="background-image: url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Görüşleri</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>


    <div class="content-inner" style="background-image: url(images/background/bg1.png);">
        <div class="container">
            <div class="row" id="masonry">
                <?php foreach ($reviews as $review){ ?>
                <div class="card-container col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="dlab-blog style-2 m-b50">
                        <div class="dlab-info">
                            {!! $review->content !!}
                            <div class="dlab-meta mb-0">
                                <ul>
                                    <li class="post-date">{{date('d-m-Y',strtotime($review->created_at))}}</li>
                                    <li class="post-author"><i class="las la-user-circle"></i> {{$review->firstname}}  {{$review->lasstname}}</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
           <?php } ?>
            </div>
        </div>
    </div>
@endsection