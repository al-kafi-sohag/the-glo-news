<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Author;

class AboutUsController  extends Controller
{
    public function index(): View
    {
        $data['our_members'] = Author::all();
        return view('frontend.about-us.index', $data);
    }

}