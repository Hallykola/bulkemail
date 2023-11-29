<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EmailJob;

class EmailController extends Controller
{
    //
    public function sendMail(Request $request){
        for($i=0; $i<10;$i++){
            dispatch(new EmailJob('hallykola@gmail.com','Mail Subject','See message body here'))->delay(now()->addMinutes(1));
        }
        dd('Hallos');
    }
}
