<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlertController extends Controller
{
    public function welcomeMail($email,$name,$header,$msg){
        $maildata=array(
            'email' => $email
        );

        $data = array(
            'name' => $name,
            'header' => $header,
            'email' => $email,
            'text' => $msg,
        );

        Mail::send('mail.createAccount',['data'=>$data],function ($message) use ($maildata){
            $message->to($maildata['email'], 'Edjuma')->subject('Edjuma');
            $message->from('mail.foena.com','Edjuma');
        });

    }
}
