<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class ContactController  extends Controller
{
    public function index(): View
    {
        return view('frontend.contact.index');
    }

    public function contact_submit(Request $request):RedirectResponse
    {


        Mail::to('demo@mail.com')->send(new WelcomeEmail([
            'name' => $request->name,
            'subject' => 'New contact us form submitted',
            'city' => $request->city,
            'email' => $request->email,
            'message' => $request->message,
       ]));

        return redirect()->route('f.contact');
    }
}
