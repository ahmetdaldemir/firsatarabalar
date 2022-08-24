@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/js/custom.js')}}"></script><!-- CUSTOM JS -->

    <div class="content-inner-2" style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
            <div class="stepwizard mb-5">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="form-1.html" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
                        <p>Yeni Araç Seçimi</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-2.html" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Boya & Değişen & İşlem </p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-3.html" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Araç Özel Bilgileri</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-4.html" type="button" class="btn btn-primary btn-circle">4</a>
                        <p>Araç Fotoğrafları</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-5.html" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                        <p>Ödeme Bilgileri</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">

                <form action="{{ route('customer_car.file_store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                    @csrf
                    <div></div>
                </form>

                <div class="col-sm-12">
                    <a href="{{route('form5')}}"   class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script>