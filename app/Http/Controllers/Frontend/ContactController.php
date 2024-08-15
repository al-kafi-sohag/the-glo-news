<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\View\View;

class ContactController
{
    public function index(): View
    {
        return view('frontend.contact.index');
    }
}
