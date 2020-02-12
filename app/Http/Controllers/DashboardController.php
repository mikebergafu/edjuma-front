<?php

namespace App\Http\Controllers;

use App\helpers\Controls;
use App\Job;
use App\JobApplication;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        //return Controls::check_user_applied(Auth::user()->id,3);

        $data = [
            'usersCount' => User::count(),
            'totalPayments' => Payment::success()->sum('amount'),
            'activeJobs' => Job::active()->count(),
            'totalJobs' => Job::count(),
            'employerCount' => User::employer()->count(),
            'agentCount' => User::agent()->count(),
            'totalApplicants' => JobApplication::count(),
            'jobs'=> Job::where('status',1)->get(),

        ];


        return view('admin.dashboard', $data);
    }
}
