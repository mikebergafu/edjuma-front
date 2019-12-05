<?php

namespace App\helpers;

use App\Job;
use App\JobApplication;

class Controls
{
    public static function getJobTitle($job_id){
        $job = Job::where('id',$job_id)->first();
        return $job->job_title;
    }

    public static function check_user_applied($user_id,$select_job){
        $job_id = array();
        $jobsApp = JobApplication::where('user_id',$user_id)->get();
        foreach ($jobsApp as $jobApp){
            $job_id[] = $jobApp->job_id;
        }

        if(in_array($select_job,$job_id)){
            return "applied";
        }

    }

}
