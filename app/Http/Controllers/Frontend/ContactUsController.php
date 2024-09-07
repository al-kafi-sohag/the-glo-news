<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactSubmitMailRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Mail\ContactSubmitMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController  extends Controller
{
    public function index(): View
    {
        return view('frontend.contact.index');
    }

    public function contact_submit(ContactSubmitMailRequest $request):RedirectResponse
    {


        Mail::to('aksohag16@gmail.com')->send(new ContactSubmitMail([
            'name' => $request->name,
            'subject' => 'New contact us form submitted',
            'city' => $request->city,
            'email' => $request->email,
            'message' => $request->message,
       ]));
       sweetalert()->success("We have received your request. We will get back to you as soon as possible");
        return redirect()->route('f.contact.index');
    }
}
