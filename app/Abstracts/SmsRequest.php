<?php

namespace App\Abstracts;

use Illuminate\Support\Facades\Log;

class SmsRequest
{

    public function __construct()
    {

        $xml = "<?xml version='1.0' encoding='UTF-8'?>
        <mainbody>
        <header>
            <company dil='TR'>Netgsm</company>
            <usercode>08503083509</usercode>
            <password>ZSGV1D6Z</password>
            <type>1:n</type>
            <msgheader>PB FRST ARB</msgheader>
        </header>
        <body>
            <msg>
             <![CDATA[" . $this->message . " ]]>
            </msg>
            <no>$this->phone</no>
        </body>
        </mainbody>";

        Log::info('burada1');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.netgsm.com.tr/sms/send/xml");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        $result = curl_exec($ch);
        Log::info('burada2');

        Log::info($result);
        list($status, $messageid) = explode(" ", $result);
        return ["status" => $status, "messageid" => $messageid];
    }


    public function __destruct()
    {
        Log::info('burada');
    }
}