<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\SubCategory;
use App\Models\TmpFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $data['news'] = Post::latest()->get();
        return view('backend.news.index', $data);
    }

    public function create(): View
    {
        $data['categories'] = Category::with(['activeSubCategories'])->activated()->latest()->get();
        $data['authors'] = Author::activated()->latest()->get();
        return view('backend.news.create', $data);
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $news = new Post();
        $news->title = $request->title;
        $news->post_date = $request->post_date;
        $news->description = $request->description;
        $news->image = '';
        $news->author_id = $request->author;

        if($request->main == '1'){
            $this->unMainAll();
        }

        $news->is_main = $request->main == '1' ? 1 : 0;
        $news->is_featured = $request->featured == '1' ? 1 : 0;
        $news->is_trending = $request->trending == '1' ? 1 : 0;
        $news->status = $request->status == '1' ? 1 : 0;
        $news->created_by = auth()->user()->id;

        $news->keywords = json_encode($request->keywords);
        $news->tags = json_encode($request->tags);
        $news->references = json_encode($request->references);
        $news->save();

        foreach($request->category as $cat){
            $subCats = SubCategory::where('c_id', $cat)->activated()->latest()->get()->pluck('id')->toArray();

            $common = array_intersect($subCats, $request->sub_category ?? []);
            if (!empty($common)) {
                foreach($common as $subcat){
                    $save = new PostCategory();
                    $save->category_id = $cat;
                    $save->subcategory_id = $subcat;
                    $save->post_id = $news->id;
                    $save->created_by = auth()->user()->id;
                    $save->save();
                }
            }else{
                $save = new PostCategory();
                $save->category_id = $cat;
                $save->post_id = $news->id;
                $save->created_by = auth()->user()->id;
                $save->save();
            }
        }

        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/news/' . $news->id . '/' . $temp_file->filename;

                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $news->image = $to_path;
                $news->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->route('b.news.update', $save->id);
            }
        }

        sweetalert()->success("News created successfully");
        return redirect()->route('b.news.index');

    }

    public function update($id): View
    {
        $data['news'] = Post::findOrFail($id);
        $data['categories'] = Category::with(['activeSubCategories'])->activated()->latest()->get();
        $data['authors'] = Author::activated()->latest()->get();
        return view('backend.news.update', $data);
    }

    public function update_store(NewsRequest $request, $id): RedirectResponse
    {
        $news = Post::with(['categories','subCategories'])->findOrFail($id);
        $news->title = $request->title;
        $news->post_date = $request->post_date;
        $news->description = $request->description;
        $news->image = '';
        $news->author_id = $request->author;

        if($request->main == '1'){
            $this->unMainAll();
        }

        $news->is_main = $request->main == '1' ? 1 : 0;
        $news->is_featured = $request->featured == '1' ? 1 : 0;
        $news->is_trending = $request->trending == '1' ? 1 : 0;
        $news->status = $request->status == '1' ? 1 : 0;
        $news->updated_by = auth()->user()->id;

        $news->keywords = json_encode($request->keywords);
        $news->tags = json_encode($request->tags);
        $news->references = json_encode($request->references);
        $news->save();

        foreach($request->category as $cat){
            $subCats = SubCategory::where('c_id', $cat)->activated()->latest()->get()->pluck('id')->toArray();

            $common = array_intersect($subCats, $request->sub_category ?? []);
            if (!empty($common)) {
                foreach($common as $subcat){
                    $save = new PostCategory();
                    $save->category_id = $cat;
                    $save->subcategory_id = $subcat;
                    $save->post_id = $news->id;
                    $save->updated_by = auth()->user()->id;
                    $save->save();
                }
            }else{
                $save = new PostCategory();
                $save->category_id = $cat;
                $save->post_id = $news->id;
                $save->updated_by = auth()->user()->id;
                $save->save();
            }
        }


        if(isset($request->image) && !empty($request->image)){
            try {
                $temp_file = TmpFile::findOrFail($request->image);

                $from_path = $temp_file->path . '/' . $temp_file->filename;
                $to_path = 'images/news/' . $save->id . '/' . $temp_file->filename;

                Storage::move($from_path, $to_path);
                Storage::deleteDirectory($temp_file->path);

                $save->img = $to_path;
                $save->save();
            } catch (\Throwable $th) {
                sweetalert()->error("Something went wrong with the image");
                return redirect()->back();
            }
        }
        sweetalert()->success("News updated successfully");
        return redirect()->route('b.news.index');

    }

    public function status($id){
        $news = Post::findOrFail($id);
        if($news->status ==1){
            $news->status = 0;
        }else{
            $news->status = 1;
        }
        $news->save();
        sweetalert()->success("News $news->name status updated successfully");
        return redirect()->route('b.news.index');
    }
    public function delete($id){
        $news = Post::findOrFail($id);
        $news->delete();

        sweetalert()->success("News $news->title deleted successfully");
        return redirect()->route('b.news.index');
    }




    private function unMainAll(): void
    {
        Post::where('is_main', 1)->update(['is_main' => 0]);
    }

}
