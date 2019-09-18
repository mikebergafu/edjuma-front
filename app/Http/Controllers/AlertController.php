<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlertController extends Controller
{

    public function sendmail($email,$name,$subject,$msg)
    {
        $maildata=array(
            'email' => $email
        );

        $data = array(
            'name' => $name,
            'email'=>$email,
            'subject' =>$subject,
            'msg' =>$msg

        );

        Mail::send('mails.getmail', ['body'=>$data], function ($message) use ($maildata) {
            $message->to($maildata['email'], 'EDJUMA')->subject
            ('Edjuma Jobs');
            $message->from('info@thepaixfx.com', 'EDJUMA');
        });
    }
}
