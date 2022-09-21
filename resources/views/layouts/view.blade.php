<!DOCTYPE html>
<html lang="tr">
<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content="Ahmet DALDEMİR - 05468038003"/>
    <meta name="robots" content=""/>
    <meta name="description" content="{{setting('meta_description')}}"/>
    <meta property="og:title" content="{{setting('meta_title')}}"/>
    <meta property="og:description" content="{{setting('meta_description')}}"/>
    <meta property="og:image" content="{{asset('storage/app/files/'.setting('theme'))}}"/>
    <meta name="format-detection" content="telephone=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>{{setting('meta_title')}}</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('storage/files/'.setting('favicon'))}}">
    <script src="{{asset('view/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <!-- Stylesheet -->


    @include('layouts/custom/style')


</head>
<body id="bg" ng-app="app" ng-controller="MainController">
<!-- div id="loading-area" class="loading-01"></div -->
<div class="page-wraper">
    @include('layouts/custom/header')
    <div class="page-content bg-white">
        @yield('content')
    </div>
    @include('layouts/custom/footer')
    <button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
@include('layouts/custom/script')

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-utils/0.1.1/angular-ui-utils.min.js" class=""></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<script src="{{asset('view/js/angular.js')}}" class=""></script>
@if(isset($customer_car) && $customer_car && $customer_car->car->model)
    <script>
        app.controller("MainController", ['$scope', '$http', '$httpParamSerializerJQLike', '$filter', function ($scope, $http, $httpParamSerializerJQLike, $window, $filter) {
            $http({
                method: "GET", url: "/getmodel?year=" + {{$customer_car->caryear}} + "&brand=" + {{$customer_car->car->brand->id}} + "", headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }, dataType: 'json', cache: true, processData: false, contentType: false

            }).then(function (response) {
                console.log(response.data);
                $scope.modelList = response.data;
            });


                $http({
                    method: "GET", url: "/getbody?year=" + {{$customer_car->caryear}} + "&brand=" + {{$customer_car->car->brand->id}} + "&model=" + '{{$customer_car->car->model}}', headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    }, dataType: 'json', cache: true, processData: false, contentType: false
                }).then(function (response) {
                    $scope.bodyList = response.data
                });


                $http({
                    method: "GET", url: "/getfuel?year=" + {{$customer_car->caryear}} + "&brand=" + {{$customer_car->car->brand->id}} + "&model=" + '{{$customer_car->car->model}}', headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    }, dataType: 'json', cache: true, processData: false, contentType: false
                }).then(function (response) {
                    $scope.fuelList = response.data
                });

            $http({
                method: "GET",
                url: "/getversionlist?year=" +  {{$customer_car->caryear}} + "&brand=" + {{$customer_car->car->brand->id}} + "&model=" +  '{{$customer_car->car->model}}' + "&body=" +  '{{$customer_car->body}}' + "&fuel=" +  '{{$customer_car->fuel}}',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false
            }).then(function (response) {
                $scope.versionList = response.data
            });

            $http({
                method: "GET", url: "/getdistricts?id=" + {{$customer_car->car_city}} + "", headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }, dataType: 'json', cache: true, processData: false, contentType: false

            }).then(function (response) {
                $scope.districtsList = response.data;
            });
        }]);
    </script>
@endif
<script>
    @if($errors->any())
    Swal.fire('{{$errors->first()}}');
    @endif
</script>

<script>
     Swal.fire('Alt yapı değişikliği kaynaklı yaşanmış olan sorunlardan dolayı özürdileriz. En kısa sürede normal işleyişimiz devam edecektir. Bize Ulaşabilirsiniz = 0850 308 35 09');
 </script>
</body>
</html>