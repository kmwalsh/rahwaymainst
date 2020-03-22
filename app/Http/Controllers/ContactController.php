<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

use Illuminate\Mail\Mailable;

class ContactController extends Controller {

    public function __construct()
    {
        
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comments' => 'required|between:25,255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/about')
                ->withInput()
                ->withErrors($validator);
        }
        
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->comments = $request->comments;

        $contact->save();
    
        return redirect('/about');
    }

    /*
    figure out how to actually send mail

    protected function builtMail()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return $this->subject('New contact forms')
                    ->from('donotreply@')
                    ->to('kmw@katemwalsh.com')
                    ->view('email.contacts');

    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Mail::send($this->builtMail());
        })->daily();
    } */

}