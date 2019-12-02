<?php

namespace App\helpers;

use App\Job;

class Controls
{
    public static function getJobTitle($job_id){
        $job = Job::where('id',$job_id)->first();
        return $job->job_title;
    }

}
