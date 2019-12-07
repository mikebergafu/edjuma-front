<?php

namespace App\helpers;

use App\Job;
use App\JobApplication;
use App\User;

class Controls
{
    public static function getJobTitle($job_id){
        $job = Job::where('id',$job_id)->first();
        return $job->job_title;
    }

    public static function countHiredJobs(){
        return $hired = JobApplication::where('is_shortlisted',2)->count();
    }

    public static function countCompletedJobs(){
        return $hired = JobApplication::where('is_shortlisted',4)->count();
    }

    public static function countCancelledJobs(){
        return $hired = JobApplication::where('is_shortlisted',3)->count();
    }

    public static function getEmployerName($emp_id){
        $user = User::where('id',$emp_id)->first();
        return $user->name;
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
