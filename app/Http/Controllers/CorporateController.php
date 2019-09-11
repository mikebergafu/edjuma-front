<?php

namespace App\Http\Controllers;

use App\Corporate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('code/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:corporates',
            'phone' => 'required|string|max:15|unique:corporates',
            'email' => 'required|string|email|max:100|unique:corporates',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $coder=new UUIDController();
            $corporate=new Corporate();
            $corporate->name=$request->get('name');
            $corporate->phone=$request->get('phone');
            $corporate->email=$request->get('email');
            $corporate->code = $coder->toNum($coder->getUUID());
            $corporate->status=false;

            $corporate->save();
        }

        Alert::success('Edjuma Corporate Sign Up', 'Sign up Send Successfully. You will receive and Activation SMS Soon.');

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function show(Corporate $corporate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function edit(Corporate $corporate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporate $corporate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporate  $corporate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporate $corporate)
    {
        //
    }
}
