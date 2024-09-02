<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //

    public function get($key)
    {
        $data['advertisement'] = Advertisement::where('key',$key)->activated()->first();
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }
}
