<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\TmpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $data['advertisement'] = Advertisement::findOrFail($id);
        return view('backend.advertisement.update', $data);
    }

    public function update_store(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $existingDetails = json_decode($advertisement->details, true);
        $formData = $request->details;

        foreach ($formData as $key => $value) {
            if (isset($formData[$key]["img"]) && !empty($formData[$key]["img"])) {
                try {
                    $temp_file = TmpFile::findOrFail($formData[$key]["img"]);

                    $from_path = $temp_file->path . '/' . $temp_file->filename;
                    $to_path = 'images/ads/' . $id . '/' . $temp_file->filename;

                    Storage::move($from_path, $to_path);
                    Storage::deleteDirectory($temp_file->path);

                    $formData[$key]["img"] = $to_path;
                } catch (\Throwable $th) {

                    sweetalert()->error("Something went wrong with the image");
                    return redirect()->back();
                }
            }

            if (isset($existingDetails[$key])) {

                $existingDetails[$key] = array_merge($existingDetails[$key], $formData[$key]);
            } else {
                $existingDetails[$key] = $formData[$key];
            }
        }
        $advertisement->details = json_encode($existingDetails);
        $advertisement->updated_by = auth()->user()->id;
        $advertisement->save();


        $advertisement->save();
        sweetalert()->success("Advertisement $advertisement->title updated successfully");
        return redirect()->route('b.ads.index');
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
