<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

// use App\Http\Controllers\MyMailer;

use App\Models\User;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     public $receiver;
     public $mailsubject;
     public $mailmessage;
    public function __construct($receiver,$mailsubject,$mailmessage)
    {
        //
        $this->receiver= $receiver;
        $this->mailsubject= $mailsubject;
        $this->mailmessage= $mailmessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailer = new \App\Http\Controllers\MyMailer();
        $mailer->SendMailOnly($this->receiver,$this->mailsubject,$this->mailmessage);
        // User::create(['name'=>'Hally5 baba','email'=>'hallybaba5@gmail.com', 'password'=>'123456']);
    }
}


