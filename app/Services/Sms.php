<?php namespace App\Services;

use App\Models\CustomerCar;

class Sms
{
    public function __construct()
    {


    }


    public function sendexpertmessage($request)
    {
        $customer_car = CustomerCar::find($request->customer_car_id);
        $message = mb_strtoupper($customer_car->plate)." Plakali aracin atamasi yapilmistir. En kisa surede arac degerlemesine baslayiniz.";
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <mainbody>
        <header>
            <company dil="TR">Netgsm</company>
            <usercode>08503083509</usercode>
            <password>ZSGV1D6Z</password>
            <type>1:n</type>
            <msgheader>PB FRST ARB</msgheader>
        </header>
        <body>
            <msg>
             <![CDATA[' . $message . ']]>
            </msg>
            <no>' . $customer_car->expert->phone . '</no>
        </body>
        </mainbody>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.netgsm.com.tr/sms/send/xml");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        $result = curl_exec($ch);
        list($status, $messageid) = explode(" ", $result);
        return ["status" => $status, "messageid" => $messageid];
    }

}