<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\SubCategoryRequset;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\SubCategory;
use App\Models\TmpFile;
use Illuminate\Support\Facades\Storage;

class SubCategoryController
{
    public function index():View
    {
        $data['subcategories'] = SubCategory::latest()->get();
        return view('backend.sub-category.index', $data);
    }
    public function create(): View
    {
        return view('backend.sub-category.create');
    }
    public function store(SubCategoryRequset $request): RedirectResponse
    {
        $save = new SubCategory;
        $save->title = $request->title;
        $save->created_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/sub-category/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, 'public/'.$to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->route('b.category.index');
            }
        }

        sweetalert()->success("Sub-Category $save->title created successfully");
        return redirect()->route('b.subCategory.index', $save->id);
    }
    public function update($id): View
    {
        $data['category'] = SubCategory::findOrFail($id);
        return view('backend.sub-category.update', $data);
    }

    public function update_store(SubCategoryRequset $request, $id):RedirectResponse
    {
        $save = SubCategory::findOrFail($id);
        $save->title = $request->title;
        $save->updated_by = auth()->user()->id;
        $save->save();

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/sub-category/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, 'public/'.$to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->back();
            }
        }
        sweetalert()->success("Sub-Category $save->title updated successfully");
        return redirect()->route('b.subCategory.index');
    }
    public function delete($id){
        $category = SubCategory::findOrFail($id);
        $category->delete();

        sweetalert()->success("Sub-Category $category->title deleted successfully");
        return redirect()->route('b.subCategory.index');
    }
    public function details($id){
        $category = SubCategory::with(['created_user','updated_user'])->findOrFail($id);
        $category->created_time=timeFormate($category->created_at);
        $category->updated_time=($category->created_at != $category->updated_at) ? timeFormate($category->updated_at):'null';
        $category->img=storage_url($category->img);


        return response()->json(['category'=>$category]);
    }

}
