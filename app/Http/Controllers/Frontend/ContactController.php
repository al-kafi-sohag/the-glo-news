<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class ContactController  extends Controller
{
    public function index(): View
    {
        return view('frontend.contact.index');
    }

    public function contact_submit($request){

        $user = User::findOrFail();
        Mail::to($user->email)->send(new WelcomeEmail([
            'name' => $user->name, 
            'city' => $user->city, 
            'email' => $user->email, 
            'message' => $user->message, 
            'subject' => 'Test Mail',
        ]));

        return redirect()->route('f.submit');
    }
}
