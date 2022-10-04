<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
<style>
    body {
        background: rgb(204, 204, 204);
    }

    page {
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
    }

    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }

    page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;
    }

    page[size="A5"] {
        width: 21cm;
        height: auto;
    }

    page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: auto;
    }

    @media print {
        body, page {
            box-shadow: 0;
        }
    }

    .car-details {
        padding: 50px;
    }
</style>
<body>
<page size="A4"
      style="display: table;background: #0a53be url('{{asset('admin/pdf/pdf-cover.png')}}');background-size: cover">
    <div style="width: 400px;margin: 0 auto;vertical-align: middle;display: table-cell;text-align: center;">
        <img src="{{asset('view/images/logo/firsat-arabalar-logo.png')}}" style="width: 400px"/>
        <table style="width: 50%;margin:0 auto;">
            <tr>
                <td style="font-size: 20px">
                    <span style="color:#fff;">{{strtoupper($customer_car->plate)}}</span> -
                    <span style="color:#fff;">{{$customer_car->car->brand_name}}  {{$customer_car->car->model}}</span>
                </td>
            </tr>
            <tr>
                <td style="font-size: 18px;color: white">Araç Değerleme ve Fiyat Eksper Raporu</td>
            </tr>
            <tr>
                <td style="font-size: 18px;color: white">{{date('d-m-Y H:i',strtotime($customer_car_valuation->updated_at))}}</td>
            </tr>
        </table>
    </div>
</page>
<page size="A5" style="color:#fff;background: #0a53be url('{{asset('admin/pdf/pdf-cover.png')}}');background-size: cover">
    <div class="car-details">
        <h4 class="mb-3 text-primary">Araç Değerleme Rapor Detayları</h4>
        <div style="line-height: 30px">
            <div class="WordSection1" style="page: WordSection1;">

                {!! $customer_car_valuation->comment !!}

                <p class="MsoNormal"
                   style="margin: 0px 0px 13px; font-size: 15px; font-family: Calibri, sans-serif; line-height: 115%;">
                    <span style="mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">&nbsp;</span><br>
                </p>

                <p class="MsoNormal"
                   style="margin: 0px 0px 13px; font-size: 15px; font-family: Calibri, sans-serif; line-height: 115%;">
                    <span style="mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">Saygılarımızla</span>
                </p>

                <p class="MsoNormal"
                   style="margin: 0px 0px 13px; font-size: 15px; font-family: Calibri, sans-serif; line-height: 115%;">
                    <b style="mso-bidi-font-weight:normal">
                        <span style="mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">Fırsat Arabalar Ekibi.</span></b>
                </p>

                <p class="MsoNormal"
                   style="margin: 0px 0px 13px; font-size: 15px; font-family: Calibri, sans-serif; line-height: 115%;">
                    <b style="mso-bidi-font-weight:normal">
                        <span style="mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">&nbsp;</span>
                    </b>
                    <br>
                </p>
            </div>


            <br><br>
            <h4 class="mb-3 text-primary">Araç Kıyaslama Linkleri</h4>
            Aracınızı kıyasladığımız bazı örnek araçlar için ilgili linkleri görebilirsiniz.<br><br>
            <b>Link 1</b>
            <br>
            <a href="{{$customer_car_valuation->link1_comment}}"
               style="color: #fff;">{{$customer_car_valuation->link1}}</a>
            <br>
            <br>
            {!! $customer_car_valuation->link1_comment !!}
            <div>
                <hr>
            </div>


            @if(!is_null($customer_car_valuation->link2))
                <br>
                <b>Link 2</b>
                <br>
                <a href="{{$customer_car_valuation->link2_comment}}"
                   style="color: #fff;">{{$customer_car_valuation->link2}}</a>
                <br>
                <br>
                {!! $customer_car_valuation->link2_comment !!}
                <div>
                    <hr>
                </div>
            @endif
            @if(!is_null($customer_car_valuation->link3))
                <br>
                <b>Link 3</b>
                <br>
                <a href="{{$customer_car_valuation->link3_comment}}"
                   style="color: #fff;">{{$customer_car_valuation->link3}}</a>
                <br>
                <br>
                {!! $customer_car_valuation->link3_comment !!}
                <div>
                    <hr>
                </div>
            @endif
            @if(!is_null($customer_car_valuation->link4))
                <br>
                <b>Link 4</b>
                <br>
                <a href="{{$customer_car_valuation->link4_comment}}"
                   style="color: #fff;">{{$customer_car_valuation->link4}}</a>
                <br>
                <br>
                {!! $customer_car_valuation->link4_comment !!}
                <div>
                    <hr>
                </div>
            @endif
            @if(!is_null($customer_car_valuation->link5))
                <br>
                <b>Link 5</b>
                <br>
                <a href="{{$customer_car_valuation->link5_comment}}"
                   style="color: #fff;">{{$customer_car_valuation->link5}}</a>
                <br>
                <br>
                {!! $customer_car_valuation->link5_comment !!}
                <div>
                    <hr>
                </div>
            @endif

            <div class="prc mt-5 rounded">
                Bir Günde Satış için Önerilen Değerleme Fiyatı :
                <b>{{number_format($customer_car_valuation->offer_price, 2)}}</b> TL
            </div>

            <div class="buttons mt-4">
                <div class="row">
                    <div class="col-lg-12 col mb-sm-2">
                        <a href="{{route('valuation_confirm',['token' =>base64_encode($customer_car_valuation->uuid),'status' => 4])}}"
                           class="confirm btn btn-success w-100 py-3 d-flex justify-content-start align-items-center">
                            <i class="fal fa-check px-3 me-1"></i>
                            <div class="text-start">
                                <b>Fırsat Fiyatını Onaylıyorum</b><br> Benimle iletişime geçin ve aracım hemen satılsın
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 col">
                        <a href="{{route('valuation_confirm',['token' => base64_encode($customer_car_valuation->uuid),'status' => 8])}}"
                           class="  btn btn-secondary w-100 py-3 d-flex justify-content-start align-items-center">
                            <i class="fal fa-times px-3 me-1"></i>
                            <div class="text-start">
                                <b>Fırsat Fiyatını Onaylamıyorum</b><br> Aracımı kendim satmayı deneyeceğim
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</page>
</body>
</html>