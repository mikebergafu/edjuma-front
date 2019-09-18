<?php

namespace App\Http\Controllers;

use App\Helpers\Payments;
use App\Helpers\Sitso;
use App\Job;
use App\JobCategory;
use App\MobileNetwork;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use OVAC\HubtelPayment\Exception\HubtelException;
use OVAC\LaravelHubtelPayment\Facades\HubtelPayment;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jobs=DB::table('jobs')
            ->where('created_by',Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->get();

        return view('job/index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_categories=JobCategory::all();
        $networks=MobileNetwork::all();
        return view('job/create', compact('job_categories',$job_categories,'networks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|string|max:50',
            /*'category' => 'required|string|max:50',
            'job_description' => 'required|string|max:250',
            'job_starts' => 'required|date|max:10',
            'job_ends' => 'required|date|max:10',
            'job_location' => 'required|string|max:50',
            'number_of_staff' => 'required|integer',
            'salary' => 'required|string|max:10',
            'salary_frequency' => 'required|string|max:20',*/

            //'mobile_no' => 'required|string|max:15',
            //'channel' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        } else {

            $pay_tran_id = substr(str_shuffle(str_repeat("0123456789", 5)), 0, $length = 12);

            $job =new Job();
            $job->job_title = $request->input('job_title');
            $job->job_category = $request->input('category');
            $job->job_location = $request->input('job_location');
            $job->job_description = $request->input('job_description');
            $job->job_starts = $request->input('job_starts');
            $job->job_ends = $request->input('job_ends');
            $job->number_of_staff = $request->input('number_of_staff');
            $job->salary = $request->input('salary');
            $job->salary_frequency = $request->input('salary_frequency');
            $job->created_by = Auth::user()->id;
            $job->update_by = Auth::user()->id;
            $job->job_type = 0;
            $job->owner_description = $pay_tran_id;
            $amount= Sitso::getPayable($job->salary,$job->salary_frequency,$job->number_of_staff,$job->job_starts,$job->job_ends);
            $salary_percent=Sitso::payablePercent($amount,4);
            $payable_amount=round($amount+$salary_percent,2);
            $phone_no=$request->input('mobile_no');
            $customer_name=DB::table('users')->where('id',Auth::user()->id)->select('first_name','last_name')->get();

            $desc="Payment for Posting a New Job";
            $network_code=$request->input('channel');
            $token="";
            $job->save();


            $save_pay = new Payment();
            $save_pay->user_id = Auth::user()->id;
            $save_pay->transaction_id =$pay_tran_id;
            $save_pay->amount =5;
            $save_pay->status =0;
            $save_pay->payment_type_id =1;
            $save_pay->save();

            return Payments::payswitch_pay($pay_tran_id,1,Auth::user()->email);
        }

        //return $ret;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
    }

    public function getJobsByCategory($category_id){
        $job_categories=JobCategory::all();
        $jobs=DB::table('jobs')->where('job_category',$category_id)
            ->join('job_categories','jobs.job_category','job_categories.id')
            ->select('jobs.id','job_title','job_description','job_starts','job_ends','salary','salary_frequency',
                'job_categories.name','jobs.created_at','job_location')
            ->get();
        //return $jobs;
        return view('home', compact('jobs',$jobs,'job_categories'));
    }

    public function makePayment($phone_no,$customer_name, $amount,$desc,$network_code,$token=""){
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
                Alert::info('Edjuma Jobs', 'Payment is being Processed...');
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

    public function getMyJobs(){
        $my_jobs=DB::table('job_seekers')->where('created_by',Auth::user()->id)->get();
        return view('job/applied_jobs', compact('my_jobs'));
        //return $my_jobs;

    }

    /*public function getApplicantResume(){
        $my_jobs=DB::table('job_seekers')->where('created_by',Auth::user()->id)->get();
        return view('job/applied_jobs', compact('my_jobs'));
        //return $my_jobs;
    }*/
}
