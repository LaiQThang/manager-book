<?php

namespace App\Heplers\Function;

use Illuminate\Support\Facades\Mail;

class SendMail{
    public static function FlyMail($view, $data = [], $subject, $receiver, $nameReceiver){
        Mail::send($view, $data , function($email) use($subject, $receiver, $nameReceiver) {
            $email->subject($subject);
            $email->to($receiver, $nameReceiver);
            return true;
        });
    }
}
