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
    <!-- script src="asset('view/js/custom.js')}}"></script> -->
     <div class="content-inner-2"
         style="background-image: url(images/background/bg2.png); background-repeat: no-repeat; background-size:100%;">
        <div class="container">
            <div class="row align-items-center">
                @include('new_view/car/menu',['url' => request()->route()->getName()])
                <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    <form class="dlab-form" method="POST" action="{{route('form4')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="dzFormMsg"></div>
                        <input type="hidden" class="form-control" name="customer_car_id" value="@if(isset($customer_car_id)){{$customer_car_id}}@else{{$customer_car->id}}@endif">
                        <div class="row">
                            <div class="col-sm-12" id="checkboxDiv">
                                <div>
                                    Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                    <input type="checkbox" id="car_details_norequire" data-for="car_details"
                                           @if(is_null(@$customer_car->car_details))  checked="checked" @endif
                                           class="norequire me-1">
                                    <label for="car_details_norequire">Esktra Yok</label>
                                </div>
                                <div class="input-group">
                                    <textarea name="car_details" id="car_details"
                                              class="form-control"
                                              style="height: auto!important;"
                                              @if(!$customer_car) disabled  placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın" @endif>@if($customer_car && !is_null($customer_car->car_details)) {{$customer_car->car_details}} @endif</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12" id="checkboxDiv">
                                <div>
                                    Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                    <input type="checkbox" id="car_notwork_norequire" data-for="car_notwork"
                                           @if(is_null(@$customer_car->car_notwork))  checked="checked" @endif
                                           class="norequire me-1">
                                    <label for="car_notwork_norequire">Esktra Yok</label>
                                </div>
                                <div class="input-group">
                                    <textarea name="car_notwork" id="car_notwork" required class="form-control"
                                              style="height: auto!important;"
                                              @if(!$customer_car) disabled  placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın" @endif>@if($customer_car && !is_null($customer_car->car_notwork)) {{$customer_car->car_notwork}} @endif</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12" id="checkboxDiv">
                                <div>
                                    Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                    <input type="checkbox" id="car_exterior_faults_norequire"
                                           @if(is_null(@$customer_car->car_exterior_faults))  checked="checked" @endif
                                           data-for="car_exterior_faults" class="norequire me-1">
                                    <label for="car_exterior_faults_norequire">Esktra Yok</label>
                                </div>
                                <div class="input-group">
                                    <textarea name="car_exterior_faults" id="car_exterior_faults" required
                                              class="form-control" style="height: auto!important;"
                                          @if(!$customer_car) disabled  placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın" @endif>@if($customer_car && !is_null($customer_car->car_exterior_faults)) {{$customer_car->car_exterior_faults}} @endif</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12" id="checkboxDiv">
                                <div>
                                    Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                    <input type="checkbox" id="car_interior_faults_norequire"
                                           @if(is_null(@$customer_car->car_interior_faults))  checked="checked" @endif

                                           data-for="car_interior_faults" class="norequire me-1">
                                    <label for="car_interior_faults_norequire">Esktra Yok</label>
                                </div>
                                <div class="input-group">
                                    <textarea name="car_interior_faults" id="car_interior_faults" required
                                              class="form-control" style="height: auto!important;"
                                            @if(!$customer_car) disabled  placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın" @endif>@if($customer_car && !is_null($customer_car->car_interior_faults)) {{$customer_car->car_interior_faults}} @endif</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div>
                                    Aracın Bakım Geçmişi <span class="text-danger">*</span>
                                </div>
                                <div class="input-group">
                                    <textarea name="maintenance_history" id="maintenance_history" required
                                              class="form-control" style="height: auto!important;"
                                              @if(!$customer_car)  placeholder="Aracınızın Bakım Geçmişi" @endif>@if($customer_car && !is_null($customer_car->maintenance_history)) {{$customer_car->maintenance_history}} @endif</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <table class="islem-table table table-bordered table-striped mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Aracın <u><strong>şasesinde</strong></u> işlem/ekleme/düzeltme var mı?
                                                <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_sasi_0"
                                                           name="status_frame" value="1" style="margin-right: 5px"
                                                    @if($customer_car && $customer_car->status_frame == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_sasi_0">Var</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input" id="durum_sasi_1"
                                                           name="status_frame" value="0" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_frame == 0) checked @endif>
                                                    <label class="form-check-label" for="durum_sasi_1">Yok</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>direklerinde</strong></u> işlem/ekleme/düzeltme var
                                                mı? <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_direk_0"
                                                           name="status_pole" value="1" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_pole == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_direk_0">Var</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_direk_1"
                                                           name="status_pole" value="0" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_pole == 0) checked @endif>
                                                    <label class="form-check-label" for="durum_direk_1">Yok</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>podyelerinde</strong></u> işlem/ekleme/düzeltme var
                                                mı? <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_podye_0"
                                                           name="status_podium" value="1" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_podium == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_podye_0">Var</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input" id="durum_podye_1"
                                                           name="status_podium" value="0" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_podium == 0) checked @endif>
                                                    <label class="form-check-label" for="durum_podye_1">Yok</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>hava yastıklarında</strong></u> işlem/kusur/değişim
                                                var mı? <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_airbag_0"
                                                           name="status_airbag" value="1" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_airbag == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_airbag_0">Var</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input" id="durum_airbag_1"
                                                           name="status_airbag" value="0" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_airbag == 0) checked @endif>
                                                    <label class="form-check-label" for="durum_airbag_1">Yok</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi satışa engel bir
                                                durumu var mı? <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_satilamaz_1"
                                                           name="status_unrealizable" value="1"
                                                           style="margin-right: 5px" @if($customer_car && $customer_car->status_unrealizable == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_satilamaz_1">Evet</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input" id="durum_satilamaz_2"
                                                           name="status_unrealizable" value="0"
                                                           style="margin-right: 5px"  @if($customer_car && $customer_car->status_unrealizable == 0) checked @endif>
                                                    <label class="form-check-label"
                                                           for="durum_satilamaz_2">Hayır</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>Ön, Arka Panel ve Bagaj Havuzu'nda</strong></u>
                                                işlem/düzeltme var mı? <span class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input"
                                                           id="durum_onArkaBagaj_1" name="status_onArkaBagaj" value="1"
                                                           style="margin-right: 5px" @if($customer_car && $customer_car->status_onArkaBagaj == 1) checked @endif>
                                                    <label class="form-check-label"
                                                           for="durum_onArkaBagaj_1">Evet</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input"
                                                           id="durum_onArkaBagaj_2" name="status_onArkaBagaj" value="0"
                                                           style="margin-right: 5px" @if($customer_car && $customer_car->status_onArkaBagaj == 0) checked @endif>
                                                    <label class="form-check-label"
                                                           for="durum_onArkaBagaj_2">Hayır</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi? <span
                                                        class="text-danger">*</span></td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input required type="radio" class="form-check-input" id="durum_km_0"
                                                           name="status_km" value="1" style="margin-right: 5px"
                                                           @if($customer_car && $customer_car->status_km == 1) checked @endif>
                                                    <label class="form-check-label" for="durum_km_0">Evet</label>
                                                </div>
                                            </td>
                                            <td width="120">
                                                <div class="form-check d-flex justify-content-center">
                                                    <input type="radio" class="form-check-input" id="durum_km_1"
                                                           name="status_km" value="0" style="margin-right: 5px" @if($customer_car && $customer_car->status_km == 0) checked @endif>
                                                    <label class="form-check-label" for="durum_km_1">Hayır</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aracın <u><strong>lastik</strong></u> durumu nasıl? <span
                                                        class="text-danger">*</span></td>
                                            <td width="240" colspan="2" class="p-0">
                                                <table class="w-100">
                                                    <tbody>
                                                    <tr>
                                                        <td width="100">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input required type="radio" class="form-check-input"
                                                                       id="durum_lastik_0" name="status_tyre" value="2"
                                                                       style="margin-right: 5px" @if($customer_car && $customer_car->status_tyre == 2) checked @endif>
                                                                <label class="form-check-label" for="durum_lastik_0">Yeni</label>
                                                            </div>
                                                        </td>
                                                        <td width="100">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input type="radio" class="form-check-input"
                                                                       id="durum_lastik_1" name="status_tyre" value="1"
                                                                       style="margin-right: 5px" " @if($customer_car && $customer_car->status_tyre == 1) checked @endif>
                                                                <label class="form-check-label" for="durum_lastik_1">Orta</label>
                                                            </div>
                                                        </td>
                                                        <td width="100">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input type="radio" class="form-check-input"
                                                                       id="durum_lastik_2" name="status_tyre" value="0"
                                                                       style="margin-right: 5px" " @if($customer_car && $customer_car->status_tyre == 0) checked @endif>
                                                                <label class="form-check-label" for="durum_lastik_2">Eski</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="alert alert-warning p-2">Aracınıza ait bir eksper raporu mevcut ise, rapor
                                    sayfalarının fotoğraflarını yükleyin.
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="form-group">
                                        <label for="expert_report_1">Exper Raporu (Sayfa 1)</label>
                                        <input type="file" name="expert_report_1" id="expert_report_1"
                                               class="form-control" style="height: 45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="form-group">
                                        <label for="expert_report_2">Exper Raporu (Sayfa 2)</label>
                                        <input type="file" name="expert_report_2" id="expert_report_2"
                                               class="form-control" style="height: 45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="form-group">
                                        <label for="expert_report_3">Exper Raporu (Sayfa 3)</label>
                                        <input type="file" name="expert_report_3" id="expert_report_3"
                                               class="form-control" style="height: 45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="form-group">
                                        <label for="expert_report_4">Exper Raporu (Sayfa 4)</label>
                                        <input type="file" name="expert_report_4" id="expert_report_4"
                                               class="form-control" style="height: 45px;">
                                    </div>
                                </div>
                            </div>
                            @if(@$customer_car && $customer_car->exper))
                            @foreach($customer_car->exper as $item)
                                <img style="width: 60px;height: 60px" src="{{asset('storage/cars')}}/{{@$item->image}}"/>
                            @endforeach
                            @endif
                            <div class="col-sm-4">
                                <label for="date_inspection">Sonraki Muayene Tarihi <span
                                            class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="date" name="date_inspection" id="date_inspection"
                                           class="form-control form-control-sm"
                                           value="{{@$customer_car->date_inspection}}" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="date_inspection">En iyi Galeri Teklifi <span
                                            class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="gal_fiyat_1" id="gal_fiyat_1" class="form-control text-end"
                                           value="{{@$customer_car->gal_price_1}}" placeholder="0.000"
                                           required="required" maxlength="19" style="height: 45px">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button name="submit" type="submit" value="Submit"
                                        class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('body-before-js')

    <script>

        $('#car_details_norequire').prop('checked', true);
        $('#car_details').attr('disabled', true);
        $('#car_details').attr('required', false);

        $('#car_notwork_norequire').prop('checked', true);
        $('#car_notwork').attr('disabled', true);
        $('#car_notwork').attr('required', false);

        $('#car_exterior_faults_norequire').prop('checked', true);
        $('#car_exterior_faults').attr('disabled', true);
        $('#car_exterior_faults').attr('required', false);


        $('#car_interior_faults_norequire').prop('checked', true);
        $('#car_interior_faults').attr('disabled', true);
        $('#car_interior_faults').attr('required', false);


        $(document).on('click', '#checkboxDiv input', function () {
            car_details_norequire = document.getElementById('car_details_norequire');
            if (car_details_norequire.checked) {
                $('#car_details').attr('disabled', true);
                $('#car_details').attr('required', false);
            } else {
                $('#car_details').attr('disabled', false);
                $('#car_details').attr('required', true);
            }

            car_exterior_faults_norequire = document.getElementById('car_exterior_faults_norequire');
            if (car_exterior_faults_norequire.checked) {
                $('#car_exterior_faults').attr('disabled', true);
                $('#car_exterior_faults').attr('required', false);
            } else {
                $('#car_exterior_faults').attr('disabled', false);
                $('#car_exterior_faults').attr('required', true);
            }

            car_notwork_norequire = document.getElementById('car_notwork_norequire');
            if (car_notwork_norequire.checked) {
                $('#car_notwork').attr('disabled', true);
                $('#car_notwork').attr('required', false);
            } else {
                $('#car_notwork').attr('disabled', false);
                $('#car_notwork').attr('required', true);
            }
            car_interior_faults_norequire = document.getElementById('car_interior_faults_norequire');
            if (car_interior_faults_norequire.checked) {
                $('#car_interior_faults').attr('disabled', true);
                $('#car_interior_faults').attr('required', false);
            } else {
                $('#car_interior_faults').attr('disabled', false);
                $('#car_interior_faults').attr('required', true);
            }
        })

    </script>
@endsection

@section('before-css')
    <link rel="stylesheet" href="{{asset('view/css/wizard.css')}}">
@endsection