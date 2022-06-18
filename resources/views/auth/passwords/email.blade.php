<!doctype html>
<html lang="en">
<head>
    <title>Fırsat Arabalar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('account/css/style.css')}}">
    <meta name="googlebot" content="noindex">
    <meta name="robots" content="noindex">
</head>
<body class="img js-fullheight" style="background-image: url({{asset('account/images/bg.jpg')}});">
<section class="ftco-section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Şifre Yenileme</h2>
        </div>
    </div>
    <div class="row justify-content-center">
             <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group text-center">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         </div>

                        <div class="form-group text-center">
                                 <button type="submit" class="btn btn-primary">
                                    {{ __('Şifremi Yenile') }}
                                </button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="{{asset('account/js/jquery.min.js')}}"></script>
<script src="{{asset('account/js/popper.js')}}"></script>
<script src="{{asset('account/js/bootstrap.min.js')}}"></script>
<script src="{{asset('account/js/main.js')}}"></script>

</body>
</html>

