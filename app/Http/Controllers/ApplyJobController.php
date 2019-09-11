<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApplyJobController extends Controller
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
        $jobs=DB::table('jobs')->where('created_by',Auth::user()->id)->orderBy('created_at','DESC')->get();

        return view('job/index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(job $job)
    {
        //$job_categories=JobCategory::all();
        return $job." user:".Auth::user()->id;
        //return view('job/create', compact('job_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(job $job)
    {
        $applied=DB::table('job_seekers')->where([['job_id',$job->id],['created_by',Auth::user()->id]])->get();
        //Get Poster
        $poster_id=DB::table('jobs')->where('id',$job->id)->pluck('created_by');

        if(count($applied)==0){
            $apply_job=new JobSeeker();
            $apply_job->job_id=$job->id;
            $apply_job->user_id=Auth::user()->id;
            $apply_job->poster_id=$poster_id[0];

            $apply_job->created_by=Auth::user()->id;
            $apply_job->update_by=Auth::user()->id;

            $save=$apply_job->save();

            if($save){
                $title='success';
                $message='You Have Successfully Applied for '.$job->job_title." Job";
            }else{
                $title='error';
                $message='An Error Occurred, Please Again in a Few Minutes';
            }
            //end save logic
        }else{
            $title='info';
            $message='You Have Already for this Job';
        }

        alert()->$title('Edjuma Jobs Application', $message);
        return redirect()->back();
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
}
