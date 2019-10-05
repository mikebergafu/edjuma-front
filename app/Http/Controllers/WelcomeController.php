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
        $data = array();
        $data['jobs1'] = [];
        $data['job_categories']=JobCategory::all();
        $data['jobs']=DB::table('jobs')
            ->join('job_categories','jobs.job_category','job_categories.id')
            ->select('jobs.id','job_title','job_description','job_starts','job_ends','salary','salary_frequency',
                'job_categories.name','jobs.created_at','job_location')
            ->get();
            ;
        //return $jobs->count();
        return view('welcome', $data);
    }

    public function search(Request $request){
       if ($request->ajax()){
           $output = '';
           $job = $request->job_title;
           $city = $request->job_city;
           $jobsearch = Job::where('job_title','LIKE','%'.$job.'%')->Where('job_location','LIKE','%'.$city.'%')->paginate();
           if ($jobsearch){
               foreach($jobsearch as $searchjob){
                   $output .= '
                   
                    <a  href='.route('jobs.apply.form',$searchjob->id).' style=" text-decoration: none;" data-confirm="Click OK to Continue with Job Application " id="confirm" class="boxshadow confirm listing part-time bg-white">
                   
                   <div class="listing-title">
                                            <h4 style="font-weight: bolder;" >'.$searchjob->job_title.'
                                                <div class="clearfix"></div>
                                                <small>Category: </small><small style="color: #26ae61">{{$job->name}} </small>
                                            </h4>
                                            <h6 class="text-dark" >'.$searchjob->job_description.'</h6>
                                            <ul class="listing-icons">
                                                <li><i class="ln ln-icon-Map2"></i>'.$searchjob->job_location.'</li>
                                                <li><i class="ln ln-icon-Money-2"></i> '.$searchjob->salary."/".$searchjob->salary_frequency.'</li>
                                                <li><div class="listing-date">'.\Carbon\Carbon::parse($searchjob->created_at)->diffForHumans().'</div></li>
                                                <li><div class="listing-date new">Apply Now</div></li>
                                            </ul>
                                        </div>
                   </a>
                   
                  
                   
                   
                   ' ;
               }
               //$jobsearch->links();
               return response($output);
           }


       }

    }
}
