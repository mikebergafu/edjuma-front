<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_categories=JobCategory::all();
        $jobs=DB::table('jobs')
            ->join('job_categories','jobs.job_category','job_categories.id')
            ->select('jobs.id','job_title','job_description','job_starts','job_ends','salary','salary_frequency',
                'job_categories.name','jobs.created_at','job_location')
            ;
        //return $jobs->count();
        return view('welcome', compact('jobs',$jobs->get(),'job_categories'));
    }
}
