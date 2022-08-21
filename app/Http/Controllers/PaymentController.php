<?php

namespace App\Http\Controllers;

use App\Services\Est3DModel;
use Illuminate\Http\Request;
use SanalPos\Est\SanalPosEst;
use SanalPos\Est\SanalPosResponseEst;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->est3dModel=new Est3DModel();

    }


    public function response(Request $request)
    {
        dd($request);
    }

    public function index(Request $request)
    {

        $clientId = "700674860028";  //Banka tarafindan verilen isyeri numarasi
        $amount = 100;         //Islem tutari
        $oid = rand(9999,9999999);     //Siparis Numarasi
        $okUrl = route('payment/response');   //Islem basariliysa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $failUrl = route('payment/response');    //Islem basarizsa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $rnd = microtime();    //Tarih veya her seferinde degisen bir deger güvenlik amaçli
        $taksit = "";         //taksit sayisi
        $islemtipi = "Auth";     //Islem tipi
        $storekey = "@198711Ad@";  //isyeri anahtari // hash hesabinda taksit ve islemtipi de kullanilir.
        $hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $islemtipi . $taksit . $rnd . $storekey;



        $hash = base64_encode(pack('H*', sha1($hashstr))); // Form parametrelerinde ve input degerlerde 3d ve ödeme için gerekli alanlar bulunur. //3d onayi ve ödeme sistem tarafindan yapilacaktir.
        print('<form method="post" action="https://sanalpos.isbank.com.tr/fim/est3Dgate" id="three_d_form" style="display: none">');
        print('<td><input type="hidden" name="_token" value="'.csrf_token().'"></td>');
        print('<td><input type="hidden" name="cardType" value="2"/></td>');
        print('<table>');
        print(' <tr>');
        print('<td>Kredi Kart Numarasi:</td>');
        print('<td><input type="text" name="pan" value="' . $request->Pan . '" size="20"/>');
        print('</tr>');
        print('<tr>');
        print('    <td>Güvenlik Kodu:</td>');
        print('     <td><input type="text" name="cv2" size="4" value="' .$request->Ccv2 . '"/></td>');
        print(' </tr>');
        print(' <tr>');
        print('    <td>Son Kullanma Yili:</td>');
        print('    <td><input type="text" name="Ecom_Payment_Card_ExpDate_Year" value="' . $request->ExpiryYr . '"/></td>');
        print('</tr>');
        print('<tr>');
        print('    <td>Son Kullanma Ayi:</td>');
        print('    <td><input type="text" name="Ecom_Payment_Card_ExpDate_Month" value="' . $request->ExpiryMo . '"/></td>');
        print('</tr>');
        print('</table>');
        print('<input type="hidden" name="clientid" value="' . $clientId . '">');
        print('<input type="hidden" name="amount" value="' . $amount . '">');
        print('<input type="hidden" name="oid" value="' . $oid . '">');
        print('<input type="hidden" name="okUrl" value="' . $okUrl . '">');
        print('<input type="hidden" name="failUrl" value="' . $failUrl . '">');
        print('<input type="hidden" name="rnd" value="' . $rnd . '" >');
        print('<input type="hidden" name="hash" value="' . $hash . '" >');
        print('<input type="hidden" name="islemtipi" value="' . $islemtipi . '" >');
        print('<input type="hidden" name="taksit" value="' . $taksit . '" >');
        print('<input type="hidden" name="currency" value="949">');
        print('<input type="hidden" name="storetype" value="3d_pay" >');
        print('<input type="submit" value="Öde" style="display:none"/>');
        print('</form>');
        print('<script>document.getElementById("three_d_form").submit();</script>');


    }

}