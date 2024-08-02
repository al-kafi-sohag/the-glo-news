<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TmpFile;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FileControlController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function upload(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid();
            $file->storeAs('tmp/'.$folder, $filename);
            $path ="tmp/" . $folder;
            $url = "tmp/" . $folder . "/" . $filename;

            $save = new TmpFile;
            $save->path = $path;
            $save->filename = $filename;
            $save->created_by = auth()->user()->id;
            $save->save();

            return $save->id;
        }
        return null;
    }
}
