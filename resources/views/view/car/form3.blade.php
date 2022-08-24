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
                        <a href="form-3.html" type="button" class="btn btn-primary btn-circle">3</a>
                        <p>Araç Özel Bilgileri</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-4.html" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p>Araç Fotoğrafları</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="form-5.html" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                        <p>Ödeme Bilgileri</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <form class="dlab-form" method="POST" action="{{route('form4')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="dzFormMsg"></div>
                    <input type="hidden" class="form-control" name="customer_car_id" value="{{$customer_car_id}}" >
                    <div class="row">
                        <div class="col-sm-12">
                            <div>
                                Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                <input type="checkbox" id="car_details_norequire" data-for="car_details" class="norequire me-1">
                                <label for="car_details_norequire">Esktra Yok</label>
                            </div>
                            <div class="input-group">
                                <textarea name="car_details" id="car_details" required class="form-control" style="height: auto!important;" placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                <input type="checkbox" id="car_notwork_norequire" data-for="car_notwork" class="norequire me-1">
                                <label for="car_notwork_norequire">Esktra Yok</label>
                            </div>
                            <div class="input-group">
                                <textarea name="car_notwork" id="car_notwork" required class="form-control" style="height: auto!important;" placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                <input type="checkbox" id="car_exterior_faults_norequire" data-for="car_exterior_faults" class="norequire me-1">
                                <label for="car_exterior_faults_norequire">Esktra Yok</label>
                            </div>
                            <div class="input-group">
                                <textarea name="car_exterior_faults" id="car_exterior_faults" required class="form-control" style="height: auto!important;" placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                Aracınızın Paketinde Olmayan Ekstraları Açıklayın
                                <input type="checkbox" id="car_interior_faults_norequire" data-for="car_interior_faults" class="norequire me-1">
                                <label for="car_interior_faults_norequire">Esktra Yok</label>
                            </div>
                            <div class="input-group">
                                <textarea name="car_interior_faults" id="car_interior_faults" required class="form-control" style="height: auto!important;" placeholder="Aracınızın Paketinde Olmayan Ekstraları Açıklayın"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                Aracın Bakım Geçmişi
                            </div>
                            <div class="input-group">
                                <textarea name="maintenance_history" id="maintenance_history" required class="form-control" style="height: auto!important;" placeholder="Aracın Bakım Geçmişi"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <table class="islem-table table table-bordered table-striped mb-0">
                                    <tbody><tr>
                                        <td>Aracın <u><strong>şasesinde</strong></u> işlem/ekleme/düzeltme var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_sasi_0" name="status_frame" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_sasi_0">Var</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_sasi_1" name="status_frame" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_sasi_1">Yok</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>direklerinde</strong></u> işlem/ekleme/düzeltme var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_direk_0" name="status_pole" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_direk_0">Var</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_direk_1" name="status_pole" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_direk_1">Yok</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>podyelerinde</strong></u> işlem/ekleme/düzeltme var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_podye_0" name="status_podium" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_podye_0">Var</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_podye_1" name="status_podium" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_podye_1">Yok</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>hava yastıklarında</strong></u> işlem/kusur/değişim var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_airbag_0" name="status_airbag" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_airbag_0">Var</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_airbag_1" name="status_airbag" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_airbag_1">Yok</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>kredi, rehin, haciz</strong></u> gibi satışa engel bir durumu var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_satilamaz_1" name="status_unrealizable" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_satilamaz_1">Evet</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_satilamaz_2" name="status_unrealizable" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_satilamaz_2">Hayır</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>Ön, Arka Panel ve Bagaj Havuzu'nda</strong></u> işlem/düzeltme var mı? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_onArkaBagaj_1" name="status_onArkaBagaj" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_onArkaBagaj_1">Evet</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_onArkaBagaj_2" name="status_onArkaBagaj" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_onArkaBagaj_2">Hayır</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>kilometresi</strong></u> orjinal mi? <span class="text-danger">*</span></td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_km_0" name="status_km" value="1" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_km_0">Evet</label>
                                            </div>
                                        </td>
                                        <td width="120">
                                            <div class="form-check d-flex justify-content-center">
                                                <input type="radio" class="form-check-input" id="durum_km_1" name="status_km" value="0" style="margin-right: 5px" required="">
                                                <label class="form-check-label" for="durum_km_1">Hayır</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aracın <u><strong>lastik</strong></u> durumu nasıl? <span class="text-danger">*</span></td>
                                        <td width="240" colspan="2" class="p-0">
                                            <table class="w-100">
                                                <tbody><tr><td width="100">
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input type="radio" class="form-check-input" id="durum_lastik_0" name="status_tyre" value="2" style="margin-right: 5px" required="">
                                                            <label class="form-check-label" for="durum_lastik_0">Yeni</label>
                                                        </div>
                                                    </td>
                                                    <td width="100">
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input type="radio" class="form-check-input" id="durum_lastik_1" name="status_tyre" value="1" style="margin-right: 5px" required="">
                                                            <label class="form-check-label" for="durum_lastik_1">Orta</label>
                                                        </div>
                                                    </td>
                                                    <td width="100">
                                                        <div class="form-check d-flex justify-content-center">
                                                            <input type="radio" class="form-check-input" id="durum_lastik_2" name="status_tyre" value="0" style="margin-right: 5px" required="">
                                                            <label class="form-check-label" for="durum_lastik_2">Eski</label>
                                                        </div>
                                                    </td>
                                                </tr></tbody></table>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="col-sm-12"><div class="alert alert-warning p-2">Aracınıza ait bir eksper raporu mevcut ise, rapor sayfalarının fotoğraflarını yükleyin.</div></div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label for="expert_report_1">Exper Raporu (Sayfa 1)</label>
                                    <input type="file" name="expert_report_1" id="expert_report_1" class="form-control" style="height: 45px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label for="expert_report_2">Exper Raporu (Sayfa 2)</label>
                                    <input type="file" name="expert_report_2" id="expert_report_2" class="form-control" style="height: 45px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label for="expert_report_3">Exper Raporu (Sayfa 3)</label>
                                    <input type="file" name="expert_report_3" id="expert_report_3" class="form-control" style="height: 45px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="form-group">
                                    <label for="expert_report_4">Exper Raporu (Sayfa 4)</label>
                                    <input type="file" name="expert_report_4" id="expert_report_4" class="form-control" style="height: 45px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="date_inspection">Sonraki Muayene Tarihi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="date" name="date_inspection" id="date_inspection" class="form-control form-control-sm" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="date_inspection">En iyi Galeri Teklifi <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="gal_fiyat_1" id="gal_fiyat_1" class="form-control text-end" placeholder="0.000" required="" maxlength="19">
                                <span class="input-group-text">TL</span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button name="submit" type="submit" value="Submit" class="btn btn-primary gradient border-0 rounded-xl btn-block">Devam Et</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        $('#car_details_norequire').prop('checked', true);
        $('#car_details').attr('disabled',true);
        $('#car_details').attr('required', false);

        $('#car_notwork_norequire').prop('checked', true);
        $('#car_notwork').attr('disabled',true);
        $('#car_notwork').attr('required', false);

        $('#car_exterior_faults_norequire').prop('checked', true);
        $('#car_exterior_faults').attr('disabled',true);
        $('#car_exterior_faults').attr('required', false);


        $('#car_interior_faults_norequire').prop('checked', true);
        $('#car_interior_faults').attr('disabled',true);
        $('#car_interior_faults').attr('required', false);


    </script>

@endsection