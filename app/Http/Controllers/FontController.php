<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Redirect,DB,Config;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class FontController extends Controller
{
    public function sendEmail(Request $request)
    {

        $user = $request->email;
        Session::put('email',$user);
        Mail::to($user)->send(new MailNotify($user));

        return redirect()->route('testmail');
    }
    public function index()
    {
        return view('admin.mail.testmail');
    }
}
