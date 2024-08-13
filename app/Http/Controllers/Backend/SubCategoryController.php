<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequset;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\TmpFile;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index():View
    {
        $data['subcategories'] = SubCategory::with(['category', 'created_user'])->latest()->get();
        return view('backend.sub-category.index', $data);
    }
    public function create(): View
    {
        $data['categories'] = Category::latest()->get();
        return view('backend.sub-category.create', $data);
    }
    public function store(SubCategoryRequset $request): RedirectResponse
    {

        $save = new SubCategory;
        $save->title = $request->title;
        $save->c_id = $request->category;
        $save->is_featured = $request->featured ?? 0;
        $save->is_header = $request->header ?? 0;
        $save->is_latest = $request->latest ?? 0;
        $save->status = $request->status ?? 0;
        $save->created_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/sub-category/' . $save->id . '/' . $temp_file->filename;
                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->route('b.sub_category.update');
            }
        }

        sweetalert()->success("Sub category $save->title created successfully");
        return redirect()->route('b.sub_category.index');
    }
    public function update($id): View
    {

        $data['subcategories'] = SubCategory::findOrFail($id);
        $data['categories'] = Category::latest()->get();
        return view('backend.sub-category.update', $data);
    }

    public function update_store(SubCategoryRequset $request, $id):RedirectResponse
    {

        $save = SubCategory::findOrFail($id);
        $save->title = $request->title;
        $save->c_id = $request->category;
        $save->is_featured = $request->featured ?? 0;
        $save->is_header = $request->header ?? 0;
        $save->is_latest = $request->latest ?? 0;
        $save->status = $request->status ?? 0;
        $save->updated_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/sub-category/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->back();
            }
        }
        sweetalert()->success("Sub category $save->title updated successfully");
        return redirect()->route('b.sub_category.index');
    }
    public function delete($id){
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();

        sweetalert()->success("Sub category $sub_category->title deleted successfully");
        return redirect()->route('b.sub_category.index');
    }
    public function details($id){
        $sub_category = SubCategory::with(['created_user','updated_user','category'])->findOrFail($id);
        $sub_category->created_time=timeFormate($sub_category->created_at);
        $sub_category->updated_time=($sub_category->created_at != $sub_category->updated_at) ? timeFormate($sub_category->updated_at):'null';
        $sub_category->img=storage_url($sub_category->img);
        $sub_category->featuredBg=$sub_category->featuredBg();
        $sub_category->featuredTitle=$sub_category->featuredTitle();
        $sub_category->latestBg=$sub_category->latestBg();
        $sub_category->latestTitle=$sub_category->latestTitle();
        $sub_category->headerBg=$sub_category->headerBg();
        $sub_category->headerTitle=$sub_category->headerTitle();
        $sub_category->statusBg=$sub_category->statusBg();
        $sub_category->statusTitle=$sub_category->statusTitle();


        return response()->json(['sub_category'=>$sub_category]);
    }

}
