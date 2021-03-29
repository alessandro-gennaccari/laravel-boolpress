<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Lead;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contact()
    {
        return view('guest.contact');
    }
    public function contactSent(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);


        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();
        Mail::to('mail@boolpress.com')->send(new SendNewMail($newLead));

        return redirect()->route('guest.contact')->with('status', 'Messaggio Inviato');
    }
}