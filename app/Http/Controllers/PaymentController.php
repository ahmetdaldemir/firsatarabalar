<?php

namespace App\Http\Controllers;

use App\Models\CustomerCar;
use App\Models\CustomerCarPaymentTransaction;
use App\Services\Est3DModel;
use Illuminate\Http\Request;
use SanalPos\Est\SanalPosEst;
use SanalPos\Est\SanalPosResponseEst;

class PaymentController extends Controller
{

    protected $customer_car_id;
    protected $ordertotal;

    public function __construct()
    {
        $this->est3dModel = new Est3DModel();
    }


    public function kuveytturk(Request $request)
    {
        $this->customer_car_id = $request->customer_car_id;
        $this->ordertotal = 169;
        $OrderId = microtime();
        $Amount = str_replace(".", "", 169);
        $OkUrl = route('payment/response');;
        $FailUrl = route('payment/response');;
        $CustomerId = 97386770;
        $MerchantId = 60233;
        $UserName = "FRSTARBAPI";
        $Password = 267343;
        $HashData = base64_encode(sha1($MerchantId . $OrderId . $Amount . $OkUrl . $FailUrl . $UserName . base64_encode(sha1($Password, "utf-8")), "utf-8"));

        $CardNumber = preg_replace('/\D/', '', $request->Pan);
        $ExpireDateMonth = $request->ExpiryMo;
        $ExpireDateYear = $request->ExpiryYr;
        $CardCVV2 = $request->Ccv2;
        $Name = "Ahmet DALDEMİR";

        $xml = "
            <KuveytTurkVPosMessage xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'>
                <APIVersion>1.0.0</APIVersion>
                <OkUrl>{$OkUrl}</OkUrl>
                <FailUrl>{$FailUrl}</FailUrl>
                <HashData>{$HashData}</HashData>
                <MerchantId>{$MerchantId}</MerchantId>
                <CustomerId>{$CustomerId}</CustomerId>
                <UserName>{$UserName}</UserName>
                <CardNumber>{$CardNumber}</CardNumber>
                <CardExpireDateYear>{$ExpireDateYear}</CardExpireDateYear>
                <CardExpireDateMonth>{$ExpireDateMonth}</CardExpireDateMonth>
                <CardCVV2>{$CardCVV2}</CardCVV2>
                <CardHolderName>{$Name}</CardHolderName>
                <CardType>MasterCard</CardType>
                <BatchID>0</BatchID>
                <TransactionType>Sale</TransactionType>
                <InstallmentCount>0</InstallmentCount>
                <Amount>{$Amount}</Amount>
                <DisplayAmount>{$Amount}</DisplayAmount>
                <CurrencyCode>0949</CurrencyCode>
                <MerchantOrderId>{$OrderId}</MerchantOrderId>
                <TransactionSecurity>3</TransactionSecurity>
            </KuveytTurkVPosMessage>
            ";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml', 'Content-length: ' . strlen($xml)));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, 'https://boa.kuveytturk.com.tr/sanalposservice/Home/ThreeDModelPayGate');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
    }


    public function paymentform()
    {
        return view('paymentform');
    }

    public function response(Request $request)
    {
        $RequestContent = urldecode($request['AuthenticationResponse']);
        $xml = simplexml_load_string($RequestContent) or die("Hata: Banka dönüş hatası");

        $MerchantOrderId = ($xml->MerchantOrderId) ? $xml->MerchantOrderId : $xml->VPosMessage->MerchantOrderId;

        if ($xml->ResponseCode == "00") {

            $Amount = intval($this->ordertotal);
            $MD = $xml->MD;

            $CustomerId = 97386770;
            $MerchantId = 60233;
            $UserName = "FRSTARBAPI";
            $Password = 267343;

            $HashData = base64_encode(sha1($MerchantId . $MerchantOrderId . $Amount . $UserName . base64_encode(sha1($Password, "utf-8")), "utf-8"));

            $_xml = "
            <KuveytTurkVPosMessage xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'>
                <APIVersion>1.0.0</APIVersion>
                <HashData>{$HashData}</HashData>
                <MerchantId>{$MerchantId}</MerchantId>
                <CustomerId>{$CustomerId}</CustomerId>
                <UserName>{$UserName}</UserName>
                <TransactionType>Sale</TransactionType>
                <InstallmentCount>0</InstallmentCount>
                <CurrencyCode>0949</CurrencyCode>
                <Amount>{$Amount}</Amount>
                <MerchantOrderId>{$MerchantOrderId}</MerchantOrderId>
                <TransactionSecurity>3</TransactionSecurity>
                <KuveytTurkVPosAdditionalData>
                    <AdditionalData>
                        <Key>MD</Key>
                        <Data>{$MD}</Data>
                    </AdditionalData>
                </KuveytTurkVPosAdditionalData>
            </KuveytTurkVPosMessage>
            ";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml', 'Content-length: ' . strlen($_xml)));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_URL, 'https://boa.kuveytturk.com.tr/sanalposservice/Home/ThreeDModelProvisionGate');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $_xml);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $response = simplexml_load_string($response) or die("Hata: Banka dönüş hatası");

            $customercar = CustomerCar::find($this->customer_car_id);
            $customercar->laststep = 5;
            $customercar->payment = 1;
            $customercar->save();

            $customercarpayment = new CustomerCarPaymentTransaction();
            $customercarpayment->customer_car_id = $this->customer_car_id;
            $customercarpayment->payment_type = "Rapor";
            $customercarpayment->order_total = $this->ordertotal;
            $customercarpayment->response_auth = json_encode($_xml);
            $customercarpayment->response_payment = json_encode($_xml);
            $customercarpayment->status = 1;
            $customercarpayment->save();
            view("success");
        } else {
            return view("fail");
        }
    }

    public function index(Request $request)
    {

        $clientId = "700674860028";  //Banka tarafindan verilen isyeri numarasi

        $total = '100';
        //Islem tutari
        $oid = rand(9999, 9999999);     //Siparis Numarasi
        $okUrl = route('payment/response');   //Islem basariliysa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $failUrl = route('payment/response');    //Islem basarizsa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $rnd = microtime();    //Tarih veya her seferinde degisen bir deger güvenlik amaçli
        $taksit = "";         //taksit sayisi
        $islemtipi = "Auth";     //Islem tipi
        $storekey = "@198711Ad@";  //isyeri anahtari // hash hesabinda taksit ve islemtipi de kullanilir.
        $hashstr = $clientId . $oid . $total . $okUrl . $failUrl . $islemtipi . $taksit . $rnd . $storekey;

        $hash = base64_encode(pack('H*', sha1($hashstr))); // Form parametrelerinde ve input degerlerde 3d ve ödeme için gerekli alanlar bulunur. //3d onayi ve ödeme sistem tarafindan yapilacaktir.
        print('<form method="post" action="https://sanalpos.isbank.com.tr/fim/est3Dgate" id="three_d_form" style="display: none">');
        print('<td><input type="hidden" name="_token" value="' . csrf_token() . '"></td>');
        print('<td><input type="hidden" name="cardType" value="2"/></td>');
        print('<table>');
        print(' <tr>');
        print('<td>Kredi Kart Numarasi:</td>');
        print('<td><input type="text" name="pan" value="' . $request->Pan . '" size="20"/>');
        print('</tr>');
        print('<tr>');
        print('    <td>Güvenlik Kodu:</td>');
        print('     <td><input type="text" name="cv2" size="4" value="' . $request->Ccv2 . '"/></td>');
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
        print('<input type="hidden" name="amount" value="' . $total . '">');
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