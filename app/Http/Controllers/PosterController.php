<?php

namespace App\Http\Controllers;

use App\Application;
use App\Job;
use App\JobSeeker;
use App\poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PosterController extends Controller
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
        $my_job_postings=DB::table('jobs')
            ->where('created_by',Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->paginate(5);

        return view('job/index', compact('my_job_postings'));
        //return $my_job_postings;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(poster $poster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(poster $poster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poster $poster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy($poster)
    {
            $delete_job = Job::where('id',$poster)->delete();

            if ($delete_job){

                session()->flash('message', 'Job Deleted');
                Session::flash('type', 'success');
                Session::flash('title', 'Success');
                return redirect()->back();

            }else{
                session()->flash('message', 'Delete Job Failed');
                Session::flash('type', 'error');
                Session::flash('title', 'error');
                return redirect()->back();
            }

    }

    public function getMyApplicants()
    {
        $data['my_applicants']=JobSeeker::get()->where('poster_id',Auth::user()->id);

        return view('poster/applicants/index', $data);
    }




    public function getApplicantResume($user_id)
    {
        $resumes=DB::table('resumes')->where('created_by', $user_id)->get();

        return view('poster/applicants/resume', compact('resumes',$resumes,'user_id'));

    }

    public function getThisJobsApplicants($job_id){

        $data['my_applicants']= DB::table('job_seekers')->where('job_id',$job_id)->get();
        $jobs=DB::table('jobs')->where('id',$job_id)->pluck('job_title');
        $data['job']=$jobs[0];
        $data['job_id'] = $job_id;

        return view('job/job_applicant', $data);
    }

    public function setShortlist($job_id,$applicant_id){
        $exists=DB::table('application_status')->where([['job_id',$job_id],['applicant_id',$applicant_id]])->get();

        if(count($exists)>0){
            $title='info';
            $message='This Applicant Has Already been Shortlisted';
        }else{
            $applicant_status=new Application();
            $applicant_status->job_id=$job_id;
            $applicant_status->applicant_id=$applicant_id;
            $applicant_status->shortlist=true;

            $applicant_status->created_by=Auth::user()->id;
            $applicant_status->update_by=Auth::user()->id;

            $save=$applicant_status->save();

            if($save){
                $title='success';
                $message='Shortlisting Successfully Saved';
            }else{
                $title='error';
                $message='An Error Occurred, Please Again in a Few Minutes';
            }
        }
        alert()->$title(strtoupper($title), $message);
        return redirect()->back();
    }

    public function getShortlist($job_id){
        $data['my_applicants']=DB::table('application_status')->where('job_id',$job_id)->get();
        $data['job_id'] =  $data['my_applicants'][0]->job_id;
        $jobs=DB::table('jobs')->where('id',$job_id)->pluck('job_title');
        $data['job']=$jobs[0];
        //return $job;
        return view('poster/applicants/shortlisted', $data);
    }

    public function setHired($job_id,$applicant_id){
        $hired=DB::table('application_status')->where([['job_id',$job_id],['hired',1]])->count('hired');
        $number_of_staff=DB::table('jobs')->where('id',$job_id)->pluck('number_of_staff');
        $staff_count=$number_of_staff[0];

       if($hired < $staff_count){
            $update_arr=array(
                'hired'=>true,
                'update_by'=>Auth::user()->id,
            );
            $update=DB::table('application_status')->where([['job_id',$job_id],['applicant_id',$applicant_id]])->update($update_arr);
            //$update="";
            if($update){
                $title='success';
                $message='Applicant Successfully Hired';
            }else{
                $title='error';
                $message='An Error Occurred, Please Again in a Few Minutes';
            }
        }else{
            $title='info';
            $message='The '.$hired.' Applicant(s) required has/have been Hired';
        }
        alert()->$title(strtoupper($title), $message)->showConfirmButton();
        return redirect()->back();

    }

    public function getHired($job_id){
        $my_applicants=DB::table('application_status')->where([['job_id',$job_id],['hired',1]])->get();
        $jobs=DB::table('jobs')->where('id',$job_id)->pluck('job_title');
        $job=$jobs[0];
        //return $my_applicants;
        return view('poster/applicants/hired', compact('my_applicants',$my_applicants,'job',$job,'job_id'));
    }
}
