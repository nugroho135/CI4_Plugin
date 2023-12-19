<?php
 //defined('BASEPATH') OR exit('No direct script access allowed');
 namespace App\Controllers;
 use Requests;
 

class CreateVA extends BaseController {
  

    public function create_function()
    {
        $http_method = "POST";
        $client_secret = NICEPAY_CLIENT_SECRET;
        date_default_timezone_set('Asia/Jakarta');
        $domain = "https://dev.nicepay.co.id/nicepay";
        $end_point = "/api/v1.0/transfer-va/create-va";
        $time_stamp = date('c');
        $partner_id = "NORMALTEST";
        $createToken = new CreateToken();

        // Call the create_function method to get the access token
        $accessToken = $createToken->create_function();
        $responseData = json_decode($accessToken->body, true);
        $access_token = $responseData['accessToken'];  
        $external_id = random_string('alnum', 5);
        $trxId = 'trxIdVA'.random_string('numeric', 6);;

        $totalAmount = [
            "value" => "15000.00",
            "currency" => "IDR"
        ];  

        $additionalInfo = [
            "bankCd" => "CENA",
            "goodsNm" => "CENA",
            "dbProcessUrl" => "https://ptsv2.com/t/jhon/post",
            "vacctValidDt" => "",
            "vacctValidTm" => "",
            "msId" => "",
            "msFee" => "",
            "mbFee" => "",
            "mbFeeType" => ""
        ];
        
        $body = [
            "partnerServiceId" => "",
            "customerNo" => "", //for fix
            "virtualAccountNo" => "",
            "virtualAccountName" => "CENA",
            "trxId" => "trxIdVa" . $time_stamp,
            "totalAmount" => $totalAmount,
            "additionalInfo" => $additionalInfo
        ];

        

        $bodyModel = [
            "partnerServiceId" => "tess",
            "customerNo" => "",
            "virtualAccountNo" => "",
            "virtualAccountName" => "CI SNAP VA",
            "trxId" => $trxId,
            "totalAmount" => $totalAmount,
            "additionalInfo" => $additionalInfo
            ];

        $body = json_encode($bodyModel);
        $hashBody = strtolower(hash('sha256', $body));

           
        $stirgSign = $http_method.":".$end_point.":".$access_token.":".$hashBody.":".$time_stamp;
        

        $bodyHasing = hash_hmac("sha512", $stirgSign, $client_secret, true);
        $signature = base64_encode($bodyHasing);


        $channel = 'channel' . random_string('numeric', 6);

        $headers = [
            "Content-Type" => "application/Json",
            "Authorization" => "Bearer " . $access_token,
            "X-TIMESTAMP" => $time_stamp,
            "X-SIGNATURE" => $signature,
            "X-PARTNER-ID" => $partner_id,
            "X-EXTERNAL-ID" => $external_id,
            "CHANNEL-ID" => $channel
        ];


        try {
            $response = Requests::post($domain . $end_point, $headers, json_encode($bodyModel));
        } catch (\Throwable $th) {
            // throw $th;
            print_r($th);
  
            return response()->json([
                'status' => $response->status(),
                'message' => $response->successful(),
                'data' => $response->json()
            ]);
  
        }
        $responseData = json_decode($response->body, true);
        print_r($responseData);
        
        
    
    }
}