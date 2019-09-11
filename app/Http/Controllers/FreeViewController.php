<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeViewController extends Controller
{

    public function getJobsByCategory($category_id){
        $job_categories=JobCategory::all();
        $jobs=DB::table('jobs')->where('job_category',$category_id)
            ->join('job_categories','jobs.job_category','job_categories.id')
            ->select('jobs.id','job_title','job_description','job_starts','job_ends','salary','salary_frequency',
                'job_categories.name','jobs.created_at','job_location')
            ->get();
        //return $jobs;
        return view('welcome', compact('jobs',$jobs,'job_categories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=DB::table('jobs')
            ->join('job_categories','jobs.job_category','job_categories.id')
            ->select('jobs.id','job_title','job_description','job_starts','job_ends','salary','salary_frequency',
                'job_categories.name','jobs.created_at','job_location')
            ->get();

        return view('home', compact('jobs'));
    }

}
