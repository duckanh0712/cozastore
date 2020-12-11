<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;


class ContactController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index ()
    {
        return view('shop.contact');
    }
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|',
            'phone' => 'required',

        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->msg = $request->msg;

        $contact->save();
        if ($contact->save()) {
            return response()->json(['msg' => 'ok'], 200);
        }
        return response()->json([],500);
    }
}

