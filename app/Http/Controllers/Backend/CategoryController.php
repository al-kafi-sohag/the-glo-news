<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\TmpFile;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index():View
    {
        $data['categories'] = Category::latest()->get();
        return view('backend.category.index', $data);
    }

    public function create(): View
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {

        $featured = $request->featured ?? 0;
        $latest = $request->latest ?? 0;
        $header = $request->header ?? 0;
        $status = $request->status ?? 0;
        $save = new Category;
        $save->title = $request->title;
        $save->is_featured = $featured;
        $save->is_header = $header;
        $save->is_latest = $latest;
        $save->status = $status;
        $save->created_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/category/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->route('b.category.update',$save->id);
            }
        }

        sweetalert()->success("Category $save->title created successfully");
        return redirect()->route('b.category.index');
    }

    public function update($id): View
    {
        $data['category'] = Category::findOrFail($id);
        return view('backend.category.update', $data);
    }

    public function update_store(CategoryRequest $request, $id):RedirectResponse
    {
        $featured = $request->featured ?? 0;
        $latest = $request->latest ?? 0;
        $header = $request->header ?? 0;
        $status = $request->status ?? 0;
        $save = Category::findOrFail($id);
        $save->title = $request->title;
        $save->is_featured = $featured;
        $save->is_latest = $latest;
        $save->is_header = $header;
        $save->status = $status;
        $save->updated_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/category/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->back();
            }
        }
        sweetalert()->success("Category $save->title updated successfully");
        return redirect()->route('b.category.index');
    }
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();

        sweetalert()->success("Category $category->title deleted successfully");
        return redirect()->route('b.category.index');
    }
    public function details($id){
        $category = Category::with(['created_user','updated_user'])->findOrFail($id);
        $category->created_time=timeFormate($category->created_at);
        $category->updated_time=($category->created_at != $category->updated_at) ? timeFormate($category->updated_at):'null';
        $category->img=storage_url($category->img);
        $category->featuredBg=$category->featuredBg();
        $category->featuredTitle=$category->featuredTitle();
        $category->latestBg=$category->latestBg();
        $category->latestTitle=$category->latestTitle();
        $category->headerBg=$category->headerBg();
        $category->headerTitle=$category->headerTitle();
        $category->statusBg=$category->statusBg();
        $category->statusTitle=$category->statusTitle();



        return response()->json(['category'=>$category]);
    }
}
