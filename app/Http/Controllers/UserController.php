<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
        //
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $acc_type = $request->account_type;
            //register user under the right account type
            switch ($acc_type){
                case 1:
                    //return  "personal account";
                    $user = new User;
                    $user->first_name = $request->input('first_name');
                    $user->last_name = $request->input('last_name');
                    $user->email = $request->input('email');
                    $user->password = Hash::make($request->input('password'));
                    $user->save();
                    break;

                case 2:
                    //return "company Account";
                    $user = new User;
                    $user->first_name = $request->input('first_name');
                    $user->last_name = $request->input('last_name');
                    $user->email = $request->input('email');
                    $user->password = Hash::make($request->input('password'));
                    $user->save();
                    break;

                default:
                    return redirect()->route('/register');

            }


        }

        Alert::success('Edjuma Registration', 'Your Sign Up is Successfully');

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
