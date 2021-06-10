<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Jobs\SendEmailJob;

class SendEmailController extends Controller
{

    /*
    |-----------------------------------------------------------------------------------------------
    | Modde By : Mansour Ahmed @mansour_tech | Project : Academy Hsoub (https://academy.hsoub.com/) |
    |-----------------------------------------------------------------------------------------------
    */

    public function home()
    {
        $emails = Newsletter::paginate(10);
        return view('company.admin.emails.index',compact('emails'));
    }

    public function sendMails(Request $request)
    {
        
        $this->validate($request,[ 
            'title'        => 'required',
            'body'         => 'required',          
        ],
        [
            'title.required'    =>  trans('app.title.required'),
            'body.required'     =>  trans('app.body.required'),
        ]);

        $message = [
            "title" => $request->title,
            "body"  => $request->body,
        ];

        // Jop :

        $jop = (new SendEmailJob($message));
        dispatch($jop);

        /*
            OR :

            $emails = ::chunk(25,function($data) use($message) {
                dispatch(new SendEmailJob($data,$message)); 
            });

        */

        return back()->with('success',trans('alerts.success.update'));
    }

    public function destroy($id)
    {
        $emails = Newsletter::find($id)->delete();
        return back()->with('danger',trans('alerts.success.delete'));
    }
}
