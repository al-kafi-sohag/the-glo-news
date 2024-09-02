<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['advertisements'] = Advertisement::latest()->get();
        return view('backend.advertisement.index', $data);
    }

    public function update($id)
    {
        // dd(json_encode(
        //     [
        //         1 => [
        //             'name' => 'Header Advertisement Image',
        //             'img' => 'img/img.png',
        //             'link' => 'https://www.abcd.com',
        //             'aspect_ratio' => '8:1',
        //             'width' => 728,
        //             'height' => 90,
        //         ]



        //     ]
        //         ));
        $data['advertisement'] = Advertisement::findOrFail($id);
        return view('backend.advertisement.update', $data);
    }

    public function update_store(Request $request, $id)
    {
        dd($request->all());
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->title = $request->title;
        $advertisement->details = json_encode([

        ]);
        $advertisement->save();
        sweetalert()->success("Advertisement $advertisement->title updated successfully");
        return redirect()->route('b.advertisement.index');
    }

    public function status($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->status = $advertisement->status == 1 ? 0 : 1;
        $advertisement->save();
        sweetalert()->success("Advertisement $advertisement->title status updated successfully");
        return redirect()->back();
    }
}
