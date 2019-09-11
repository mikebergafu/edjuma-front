<?php
/**
 * Created by PhpStorm.
 * User: APPUSER3
 * Date: 7/17/2018
 * Time: 8:56 AM
 */

namespace App\Helpers;


use App\Job;
use App\Resume;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use OVAC\HubtelPayment\Exception\HubtelException;
use OVAC\LaravelHubtelPayment\Facades\HubtelPayment;
use RealRashid\SweetAlert\Facades\Alert;

class Sitso
{

    public static function getPayable($salary, $frequency,$no_of_staff, $from_date,$to_date):float{
        $no_of_days=(strtotime($to_date)-strtotime($from_date))/86400;
        switch ($frequency) {
            case "daily":
                $amount=$no_of_days*$salary*$no_of_staff;
        break;
            case "weekly":
                $amount=($no_of_days/7)*$salary*$no_of_staff;
        break;
            case "monthly":
                $amount=($no_of_days/30)*$salary*$no_of_staff;
        break;

            default:
                $amount=$no_of_days*$salary*$no_of_staff;

        }

        return $amount;
    }

    public static function payablePercent($amount,$percent):float{
        $percentAmount=($percent/100)*$amount;
        return $percentAmount;
    }

    public static function toDec($num){
        return number_format($num,2, '.', ',');
    }

    public static function makePayment($phone_no,$customer_name, $amount,$desc,$network_code,$token=""){
        try {
            // NOTE: The phone number must be of type string as Laravel considers all numbers with a leading 0 to be a hex number.
            $payment = HubtelPayment::ReceiveMoney()
                ->from($phone_no)//- The phone number to send the prompt to.
                ->amount($amount)//- The exact amount value of the transaction
                ->description($desc)//- Description of the transaction.
                ->customerName($customer_name)//- Name of the person making the payment.callback after payment.
                ->channel($network_code)//- The mobile network Channel.configuration
                ->token($token)//- The mobile network Channel.configuration
                ->run();

            if ($payment) {
                //return response()->json($payment, 200);
                //Alert::info('Edjuma Jobs', 'Payment is being Processed...');
            } else {

                throw new HubtelException();
            }

        }
        catch (HubtelException $e) {

            $error=array(
                'code'=>$e->getCode(),
                'message'=>$e->getMessage()
            );
            Alert::info('Edjuma Jobs', $e->getMessage());
        }

    }

    public  static function getCategoryJobCount($category_id){
        $jobs=Job::get()->where('job_category',$category_id);
        return count($jobs);
    }

    public  static function getUser($user_id){
        $user=Job::get()->where('id',$user_id);
        return $user[0];
    }

    public static function getAUser($user_id){
        $user=DB::table('users')->where('id',$user_id)->get();
        //$user=User::get()->where('id',$user_id);
        return $user[0]->first_name." ".$user[0]->last_name;
    }

    public static function getEmail($user_id){
        $user=DB::table('users')->where('id',$user_id)->get();
        //$user=User::get()->where('id',$user_id);
        return $user[0]->email;
    }


    public static function getJob($user_id){
//        $my_job=Resume::get()->where('created_by', $user_id);
        $my_job=DB::table('resumes')->where('created_by', $user_id)->get();

        if(count($my_job)>0){
            $job_title=$my_job[0]->job_title;
        }else{
            $job_title='Sorry! No Job Title found';
        }
        return $job_title;
    }

    public static function getMyJob($job_id){
        $my_job=DB::table('jobs')->where('id', $job_id)->get();

        if(count($my_job)>0){
            $job_title=$my_job[0]->job_title;
        }else{
            $job_title='Sorry! No Job Title found';
        }
        return $job_title;
    }

    public static function getJobCategory($category_id){
        $job_category=DB::table('job_categories')->where('id', $category_id)->get();

        if(count($job_category)>0){
            $job_cat=$job_category[0]->name;
        }else{
            $job_cat='Sorry! No Job Category found';
        }
        return $job_cat;
    }

    public static function getThisApplicantCount($job_id,$poster_id){
        $applicant_count=DB::table('job_seekers')->where([['job_id',$job_id],['poster_id',$poster_id]])->get();

        if(count($applicant_count)>0){
            $count=count($applicant_count);
        }else{
            $count='No Applicant Yet';
        }
        return $count;
    }

    public static function getShortlistStatus($job_id,$applicant_id){
        $shortlist_status=DB::table('application_status')->where([['job_id',$job_id],['applicant_id',$applicant_id]])->get();

        if(count($shortlist_status)>0){
            $count=count($shortlist_status);
        }else{
            $count='0';
        }
        return $count;
    }

    public static function checkPro($id){
        $isPro=DB::table('pro_statuses')->where([['pro_id',$id],['status',1]])->get();
        return count($isPro);
    }

    public static function seePro(){
        $isPro=DB::table('pro_statuses')->where('pro_id',Auth::user()->id)->get();
        return count($isPro);
    }


}