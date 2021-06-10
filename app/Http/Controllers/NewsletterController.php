<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    protected $emails;

    public function __construct(Newsletter $emails)
    {
        $this->emails = $emails ;
    }

    public function newsletters(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:newsletters',
        ],
        [
            'email.unique' =>  trans('alerts.unique')
        ]);

        $this->emails->create($request->all());
        return back()->with('success',trans('alerts.success'));
    }
}
