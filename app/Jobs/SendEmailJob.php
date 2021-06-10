<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Newsletter;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $details;
    //public $timeout=3600;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newsletters = Newsletter::all();
        $input['title'] = $this->details['title'];
        $input['body']  = $this->details['body'];

        foreach ($newsletters as $newsletter)
        {
            $input['email'] = $newsletter->email;
            \Mail::send('company.admin.emails.message',['input' => $input],function($message) use($input){
                $message->to($input['email'])->subject($input['title'])->from("mansour.tech@gmail.com");
            });
        }
    }
}
