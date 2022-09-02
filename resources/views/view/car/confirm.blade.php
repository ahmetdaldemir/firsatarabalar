@extends('layouts.view')
@section('content')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/js/custom.js')}}"></script><!-- CUSTOM JS -->
    <script src="{{asset('view/js/js/dz.ajax.js')}}"></script><!-- CUSTOM JS -->

    <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                <form action="{{route('form1')}}" method="get">
                    <div class="col-lg-12 m-b30 wow fadeIn m-t80 m-b40" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="box m-b20">
                            <p>Fırsat arabalar'da aracınız sat !</p>
                            <h6 class="m-b30">Sözleşmeleri okuyunuz ve onaylayınız</h6>
                            <label style="left: 43px;position: relative;top: 26px;"><a href="#" id="agreement">Online araç satış sözleşmesi Okudum ve Onaylıyorum</a></label>
                            <label class="container">
                                <input type="checkbox" name="agreement" required>
                                <span class="checkmark"></span>
                            </label>

                            <label style="left: 43px;position: relative;top: 26px;"><a href="#" id="kvkk">KVKK metinini
                                    online okudum ve onaylıyorum</a></label>
                            <label class="container">
                                <input type="checkbox" name="kvkk" required>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="">
                            <button class="btn btn-primary float-end">İLERİ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kvkkModal" tabindex="-1" role="dialog" aria-labelledby="kvkkModalLabel"
         aria-hidden="true" style="    z-index: 10582;">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kvkkModalLabel">KVKK METNİ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;overflow: scroll">
                    {!! $kvkk->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="agreementModal" tabindex="-1" role="dialog" aria-labelledby="agreementModalLabel"
         aria-hidden="true" style="    z-index: 10582;">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kvkkModalLabel">ONLİNE ARAÇ SATIŞ SÖZLEŞMESİ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;overflow: scroll">
                    {!! $agreement->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

    <style>

        .box {
            background-color: #f6f6f6;
            color: #2a2a2a;
            padding: 50px 100px 40px 60px;
            border-radius: 11px;
            border: 2px solid #797979;
        }

        .box p {
            font-size: 1.3em;
            letter-spacing: 1px;
            word-spacing: 0.15em;
            font-weight: 500;
            margin-bottom: 10px;
        }

        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 40px;
            margin-bottom: 25px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .container .checkmark {
            position: absolute;
            /* top: -4px; */
            left: 0;
            background: #00309c;
            height: 25px;
            width: 25px;
            border: -1px white solid;
            /* border-radius: 50%; */
        }

        .container#disabled {
            cursor: not-allowed;
            height: 45px;
        }

        .container#disabled .label,
        .container#disabled .checkmark {
            opacity: 0.4;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input:not(.disabled) ~ .checkmark {
            background-color: #00309c;
        }

        /* When the radio button is checked, add a white background */
        .container input:checked ~ .checkmark {
            background-color: #00309c;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "✔";
            color: #fff;
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */

        .container .checkmark:after {
            top: 0px;
            left: 6px;
            width: 14px;
            height: 13px;
            /* border-radius: 50%; */
            /* background: #6152f4; */
        }

        .tooltiptext {
            visibility: visible;
            width: 240px;
            background-color: white;
            color: black;
            font-size: 0.9em;
            text-align: left;
            border-radius: 5px;
            padding: 25px;
            position: absolute;
            z-index: 1;
            top: 100%;
            left: 0;
            box-shadow: 0px 4px 12px 0px rgba(97, 82, 244, 0.1);
        }

        .tooltiptext::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 12px;
            border-color: white transparent transparent white;
            transform: rotate(45deg);
            top: -12px;
            left: 40px;
            border-radius: 6px 0px 0px 0px;
        }

        .tooltiptext a {
            color: #6152f4;
            text-decoration: none;
        }
    </style>
    <script>
        $("#kvkk").click(function () {
            $("#kvkkModal").modal('show');
        });
        $("#agreement").click(function () {
            $("#agreementModal").modal('show');
        });
    </script>
@endsection