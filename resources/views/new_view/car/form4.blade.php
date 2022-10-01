@extends('layouts.view_new')
@section('content')
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Aracını Ekle</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Araç Ekleme</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                @include('new_view/car/menu',['url' => request()->route()->getName()])

                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">

                    <form action="{{ route('customer_car.file_store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                        <input type="hidden" class="form-control" name="customer_car_id" value="@if(isset($customer_car_id)){{$customer_car_id}}@else{{$customer_car->id}}@endif">
                        @csrf

                            <div class="dz-message" data-dz-message><span>Resim yüklemek için tıklayınız...</span></div>
                     </form>
                    <div class="row m-b50 m-t50">
                        @if($customer_car && !is_null($customer_car->photo))
                            <ul class="list-unstyled">
                                @foreach($customer_car->photo as $photo)
                                    <li class="media"  style="width: 100px;float: left">
                                        <img class="mr-3" style="width: 100px" src="{{asset('storage/cars')}}/{{$photo->image}}" alt="Generic placeholder image">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="col-lg-12" ng-init="getImage({{$customer_car_id}})">
                        <picture ng-repeat="image in images">
                            <source srcset="..." type="image/svg+xml">
                            <img src="{{asset('storage/cars')}}/@{{image.image}}" class="img-fluid img-thumbnail" alt="...">
                        </picture>
                    </div>
                    <div class="col-sm-12">
                        <a href="{{route('form5',['customer_car_id' => $customer_car_id])}}" class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('body-before-js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <!-- Stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js" class=""></script>

    <script> var app = angular.module("app", ['ngSanitize']);
        app.filter('unsafe', function ($sce) {
            return $sce.trustAsHtml;
        });
        app.directive('customOnChange', function() {
            return {
                restrict: 'A',
                link: function(scope, element, attrs) {
                    var onChangeFunc = scope.$eval(attrs.customOnChange);
                    element.unbind('change').bind('change', function(e) {
                        onChangeFunc(e);
                    });
                }
            };
        });
    </script>
    <script src="{{asset('new_view/js/angular.js')}}" class=""></script>

    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/js/custom.js')}}"></script><!-- CUSTOM JS -->
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>
@endsection
