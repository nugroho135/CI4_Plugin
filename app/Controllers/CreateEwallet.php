<?php
 //defined('BASEPATH') OR exit('No direct script access allowed');
 namespace App\Controllers;
 use Requests;
 

class CreateEwallet extends BaseController {
  

    public function generate_ewallet()
    {
        
        $http_method = "POST";
        $client_secret = NICEPAY_CLIENT_SECRET;
        date_default_timezone_set('Asia/Jakarta');
        $domain = "https://dev.nicepay.co.id/nicepay";
        $end_point = "/api/v1.0/debit/payment-host-to-host";
        $time_stamp = date('c');
        //$x_time_stamp = $time_stamp->toIso8601String();
        //$date = $time_stamp->format('YmdHis');
        $partner_id = "NORMALTEST";
        $createToken = new CreateToken();

        //print_r($x_time_stamp);

        // Call the create_function method to get the access token
        $accessToken = $createToken->create_function();
        $responseData = json_decode($accessToken->body, true);
        $access_token = $responseData['accessToken'];  
        $external_id = random_string('alnum', 5);
        $trxId = 'trxIdVA'.random_string('numeric', 6);
        $reference_no = 'refNo'. random_string('numeric', 10);

      $urlParam = array();
        $paramNotify = [
            "url" => "https://ptsv2.com/t/jhon/post",
            "type" => "PAY_NOTIFY",
            "isDeeplink" => "Y"
        ];
        array_push($urlParam, $paramNotify);
        $paramReturn = [
            "url" => "https://ptsv2.com/t/jhon/post",
            "type" => "PAY_RETURN",
            "isDeeplink" => "Y"
        ];
        array_push($urlParam, $paramReturn);

    //print_r ($urlParam);

        $items = array();
        
        $itemA = [
            "img_url" => "https://d3nevzfk7ii3be.cloudfront.net/igi/vOrGHXlovukA566A.medium",
            "goods_name" => "Nokia 3360",
            "goods_detail" => "Old Nokia 3360",
            "goods_amt" => "0.00",
            "goods_quantity" => "1"
        ];
        array_push($items, $itemA);
        $itemB = [
            "img_url" => "https://d3nevzfk7ii3be.cloudfront.net/igi/vOrGHXlovukA566A.medium",
            "goods_name" => "Nokia 3360",
            "goods_detail" => "Old Nokia 3360",
            "goods_amt" => "1.00",
            "goods_quantity" => "15"
        ];
        array_push($items, $itemB);
        $countAmt = 0;
        $countItm = 0;
        foreach ($items as $itm) {
            $amt = $itm["goods_amt"];
            str_replace(".00", "", $amt);

            $countAmt += (int) $itm["goods_quantity"] * (int) $amt;
            $countItm++;
        }
        
        $cartData = [
            "count" => "$countItm",
            "item" => $items
        ];

        $Amount = [
            "value" => $countAmt . ".00",
            "currency" => "IDR"
        ];  
        

        $additionalInfo = [
            "mitraCd" => "DANA",
            "goodsNm" => "Testing ewallet",
            "billingNm" => "ewallet test",
            "billingPhone" => "081227619520",
            "dbProcessUrl" => "http://ptsv2.com/t/dbProcess/post",
            "callBackUrl" => "https://www.nicepay.co.id/IONPAY_CLIENT/paymentResult.jsp",
            "cartData" => json_encode($cartData)
        ];

    

        $bodyModel = [
            "partnerReferenceNo" => $reference_no,
            "merchantId" => $partner_id,
            "subMerchantId" => "",
            "externalStoreId" => "",
            "validUpTo" => "",
            "urlParam" => $urlParam,
            "pointOfInitiation" => "Mobile App",
            "amount" => $Amount,
            "additionalInfo" => $additionalInfo
            ];

        $body = json_encode($bodyModel);
        $hashBody = strtolower(hash('sha256', $body));

           
        $stirgSign = $http_method . ":" . $end_point . ":" . $access_token . ":" . $hashBody . ":" . $time_stamp;
        $bodyHasing = hash_hmac("sha512", $stirgSign, $client_secret, true);
        print_r($stirgSign);
        //GET SIGNATURE
        $signature = base64_encode($bodyHasing);
        //GET CHANNEL-ID
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


        //print_r($headers);


        try {
            $response = Requests::post($domain . $end_point, $headers, json_encode($bodyModel));
           // $obj_response = $response->object();
        } catch (\Throwable $th) {
            // throw $th;
            print_r($th);
  
            return response()->json([
                'status' => $response->status(),
                'message' => $response->successful(),
                'data' => $response->json()
            ])->setEncodingOptions(JSON_UNESCAPED_SLASHES);
  
        }
        $responseData = $response->body;

        print_r(json_encode($responseData, unescaped_slash));

       

        
        
    
    }
}