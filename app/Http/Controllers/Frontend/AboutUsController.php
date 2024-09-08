<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AboutUsController  extends Controller
{

    public function index(): View
    {
        return view('frontend.about-us.index');
    }
}
