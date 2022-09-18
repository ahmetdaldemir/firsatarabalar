@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/js/custom.js')}}"></script><!-- CUSTOM JS -->

    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                @include('view/car/menu',['url' => request()->route()->getName()])

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


                    <div class="col-sm-12">
                        <a href="{{route('form5',['customer_car_id' => $customer_car->id])}}" class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script>