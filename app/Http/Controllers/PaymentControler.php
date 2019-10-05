<?php

namespace App\Http\Controllers;

use App\Events\AddJobAlert;
use App\Helpers\Payments;
use App\Helpers\Sitso;
use App\Job;
use App\Payment;
use App\Providers\MikeBergProvider;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OVAC\HubtelPayment\Exception\HubtelException;
use OVAC\LaravelHubtelPayment\Facades\HubtelPayment;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function index(){

    }

    //using edjuma/payment/makepayment route and checkpayment route to test the payment
    //doing this already in the jobController
    public function makePayment()
    {
        $pay_tran_id = substr(str_shuffle(str_repeat("0123456789", 5)), 0, $length = 12);
        return Payments::payswitch_pay($pay_tran_id,1,'dickson0542511047@gmail.com');
    }

    public function checkPaymentStatus(){
        $tran_id = $_GET['check'];
        $payswitch_tran_id = substr($tran_id, 0, 12);

        //$payswitch_tran_id = $_GET['check'];
        $response = Payments::checkPaymentStatus($payswitch_tran_id);
         $result = $response['status'];

        if ($result == "approved"){

            //update Jobs -> job_type = 1, using Owners_description = $tran_id
            $payswitch_tran =  "$payswitch_tran_id";

            $update_jobs = Job::where('owner_description',$payswitch_tran)->first();
            $update_jobs->job_type = 1;
            $update_jobs->update();

            //update Payments ->status = 1, using transaction_id = $tran_id
            $update_payment = Payment::where('transaction_id',$payswitch_tran_id)->first();
            $update_payment->status = 1;
            $update_payment->update();

            //get user
            $user_mail = Auth::user()->email;
            $user_name = Auth::user()->first_name;

            //write msg to email
            $subject = 'Payment Successfull';
            $msg = "Your job, $update_jobs->job_title needed has be placed successfully. Thank you.";



            //send email notification to user for payment confirmation
            \event(new AddJobAlert($user_mail,$user_name,$subject,$msg));



            //return $response['status'];
            Alert::success('Edjuma Jobs', 'Payment Successfull');
            return redirect()->to('/jobs/form');



        }else{
            $resStatus = $response["status"];
            //update Payments ->status = 2, using transaction_id = $tran_id
            $update_payment = Payment::where('transaction_id',$payswitch_tran_id)->first();
            $update_payment->status = 2;
            $update_payment->update();

            Alert::info('Edjuma Jobs', $resStatus);
            return redirect()->to('/jobs/form');
        }


    }

}
