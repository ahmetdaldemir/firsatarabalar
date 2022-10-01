@extends('layouts.view_new')
@section('content')
    <!--
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
    <script src="{{asset('view/js/custom.js')}}"></script>
    <script src="{{asset('view/js/dz.ajax.js')}}"></script>
 -->
    <div class="page-header bg-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1>Aracını Ekle</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sözleşme</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:50px;background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="alert alert-warning">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-b30 wow fadeIn m-t80 m-b30" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="box m-b20">
                            <p>Fırsat arabalar'da aracınız sat !</p>
                            <h6 class="m-b30">Sözleşmeleri okuyunuz ve onaylayınız</h6>
                            <div class="">
                                <iframe style="width: 50%;margin: 0 auto;" height="315" src="https://www.youtube.com/embed/rHUvxK37RAg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <label style="left: 43px;position: relative;top: 26px;"><a href="#" id="agreement">Online araç  satış sözleşmesi Okudum ve Onaylıyorum</a></label>
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
                    </div>
                    <!--
                    <?php if($customer_car){ ?>
                    <div class="col-lg-12 m-b30 wow fadeIn m-b40" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="box m-b20">
                            <p>Daha önce eklenmiş bir aracınız bulunmaktadır. Devam etmek istermisiniz ?</p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="">
                        <?php if($customer_car){ ?>
                          <button onclick="requiredButton(1,{{$customer_car->id??0}})" class="btn btn-danger float-end">Devam Etmek İstiyorum</button>
                        <?php } ?>
                        <button onclick="requiredButton(0,0)" class="btn btn-warning float-end text-white">Yeni Araç eklemek istiyorum</button>
                    </div>
                    -->
                    <div>
                    <button onclick="requiredButton(0,0)" class="btn btn-warning float-end text-white m-b30">Araç eklemek istiyorum</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kvkkModal" tabindex="-1" role="dialog" aria-labelledby="kvkkModalLabel"
         aria-hidden="true" style="    z-index: 10582;">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kvkkModalLabel">KVKK METNİ</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;overflow: scroll">
                    {!! $kvkk->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
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
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px;overflow: scroll">
                    {!! $agreement->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('body-after-js')
    <script>

        function requiredButton(id,is_data) {
            if (!$('input[name=agreement]').is(':checked')) {
                alert("Sözleşmeyi kabul etmelisiniz");
                return false;
            }
            if (!$('input[name=kvkk]').is(':checked')) {
                alert("Kvkk kabul etmelisiniz");
                return false;
            }
            window.location.href = 'form1?status='+id+'&is_data='+is_data+'';

        }

        $("#kvkk").click(function () {
            $("#kvkkModal").modal('show');
        });
        $("#agreement").click(function () {
            $("#agreementModal").modal('show');
        });
    </script>
@endsection