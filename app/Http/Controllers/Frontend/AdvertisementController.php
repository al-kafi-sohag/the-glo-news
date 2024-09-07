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


        Mail::to('akhtaruzzamansumon7@gmail.com')->send(new AdvertisementMail([
            'title' => $request->title,
            'subject' => 'New contact us form submitted',
            'key' => $request->key,
            'details' => $request->details,
       ]));
       sweetalert()->success("We have received your request. We will get back to you as soon as possible");
        return redirect()->route('f.contact.index');
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
