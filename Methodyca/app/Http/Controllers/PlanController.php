<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use App\Mail\PlanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'authorEmail' => 'required',
            'data' => 'required',
            'token' => ['required', new Recaptcha()]
        ]);


        $details = [
            'student' => $request->author,
            'email' => $request->authorEmail,
            'data' => $request->data,
        ];

        // Ship the plan...
        Mail::to('dlg@tlu.ee',
        'DLG Staff')
        ->cc($request->authorEmail, $request->author)
        ->send(new PlanMail($details));
    }
}
