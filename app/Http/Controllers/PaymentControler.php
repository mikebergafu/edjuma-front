<?php

namespace App\Http\Controllers;

use App\Helpers\Sitso;
use App\Providers\MikeBergProvider;
use Illuminate\Http\Request;
use OVAC\HubtelPayment\Exception\HubtelException;
use OVAC\LaravelHubtelPayment\Facades\HubtelPayment;

class PaymentControler extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phone_no="0246102372";
        $customer_name="Mike-berg Afu";
        $amount="50";
        $desc="Payment for Posting a New Job";
        $network_code="mtn-gh";
        $token="";

        Sitso::makePayment($phone_no,$customer_name, $amount,$desc,$network_code);
    }

}
