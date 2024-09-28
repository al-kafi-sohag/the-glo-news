<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\AdvertisementMailRequest;
use Illuminate\Http\RedirectResponse;
use App\Mail\AdvertisementMail;
use Illuminate\Support\Facades\Mail;

class AdvertisementController extends Controller
{

    public function index(): View
    {
        return view('frontend.advertisement.index');
    }

    public function advertisement_submit(AdvertisementMailRequest $request):RedirectResponse
    {


        Mail::to('firozjourno@gmail.com')->send(new AdvertisementMail([
            'name' => $request->name,
            'subject' => 'New advertisement form submitted',
            'city'=>$request->city,
            'email' => $request->email,
            'message' => $request->message,
       ]));
       sweetalert()->success("We have received your request. We will get back to you as soon as possible");
        return redirect()->route('f.advertisement.index');
    }
    public function get($key)
    {
        $data['advertisement'] = Advertisement::where('key',$key)->activated()->first();
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }
}
