<?php
/**
 * Created by PhpStorm.
 * User: Dixon
 * Date: 15-Sep-19
 * Time: 18:23
 */

namespace App\Helpers;


use App\Job;
use Psy\Util\Str;
use RealRashid\SweetAlert\Facades\Alert;

class Payments
{
    private static function amt_convert_to_payswitch($amount){
            $amt = $amount.'00';
            $number_of_digit = 12;
            $newAmount = str_pad($amt, $number_of_digit, '0', STR_PAD_LEFT);
            return $newAmount;
    }

    //request payswitch payment portal
    public static function payswitch_pay ($tranid,$amount,$email)
    {
        $amountpay = self::amt_convert_to_payswitch($amount);

        $merchant_id = "TTM-00000323";
        $user_name = 'kingdom5c8b5297ee0ff';
        $api_key = 'OTFjOGZkZDQwZmIwODM4ZTA1YTBhODI2Y2U3ZGRiOTE=';
        $payload = json_encode([
            "merchant_id"=>$merchant_id,
            "transaction_id"=>$tranid,
            "desc"=>"Deposit",
            "amount"=>$amountpay,
            "redirect_url"=>"http://localhost:8000/edjuma/payment/checkpayment?check=".$tranid,
            //"redirect_url"=>"https://tbnglobal.org",
            "email"=>$email
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://prod.theteller.net/checkout/initiate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic ".base64_encode($user_name.':'.$api_key)."",
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            ),
        ));
         $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            //echo "cURL Error #:" . $err;
            Alert::danger('Edjuma Jobs', 'Payment Server Is Down');
            return redirect()->back();
        } else {
            //return $response;
             $decode = json_decode($response, true);
            $token = $decode['token'];
            return redirect('https://prod.theteller.net/checkout/checkout/'.$token);
        }
    }//payswitch ends here http://localhost:8000/edjuma/payment/makepayment



    public static function checkPaymentStatus($transaction_id){
        //return $transaction_id;
        $curl = curl_init();
        $transaction_id = $transaction_id;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://prod.theteller.net/v1.1/users/transactions/".$transaction_id."/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Merchant-Id: TTM-00000323"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            Alert::danger('Edjuma Works','Payment Declined');
        } else {
            //echo $response;
            return $decode = json_decode($response, true);


        }
    }//payswitch check ends here

}
