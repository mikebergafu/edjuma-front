<?php

namespace App\Http\Controllers;

use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ResumeController extends Controller
{
    public $inputs=[
        'job_title' => 'required|string|max:50',
        'location' => 'required|string|max:50',
        'month_year' => 'required|string|max:20',
        'summary' => 'required|string|max:500',
    ];
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
        $resumes=DB::table('resumes')->where('created_by', Auth::user()->id)->get();
        //$resumes=Resume::get()->where('created_by', Auth::user()->id);
        //return $resumes;
        return view('poster/resume/index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poster/resume/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->inputs);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $resume=new Resume();
            $resume->job_title=$request->get('job_title');
            $resume->location=$request->get('location');
            $resume->month_year=$request->get('month_year');
            $resume->summary=$request->get('summary');

            $resume->created_by=Auth::user()->id;
            $resume->update_by=Auth::user()->id;

           /* alert()
                ->question('Confirm New Record', 'Click Yes to Save Record')
                ->footer('<a href>Why do I have this issue?</a>')
                ->showConfirmButton('Submit', '#df1234')
                ->showCancelButton()
                ->showCloseButton();*/

           $save=$resume->save();

            if($save){
                $title='success';
                $message='Your Previous Work Details have been Added';
            }else{
                $title='error';
                $message='An Error Occurred, Please Again in a Few Minutes';
            }

        }
        //alert()->success('Alert Persistent', 'Successfully')->persistent(false,true);
        alert()->$title(strtoupper($title), $message);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(resume $resume)
    {
        return view('',compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(poster $poster)
    {
        //
    }
}
