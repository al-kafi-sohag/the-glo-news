<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index():View
    {
        $data['authors'] = Author::latest()->get();
        return view('backend.author.index',$data);
    }
    public function create():View
    {
        return view('backend.author.create');
    }
    public function store(AuthorRequest $request): RedirectResponse
    {
        $status = $request->status ?? 0;
        $save = new Author();
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $status;
        $save->created_by = auth()->user()->id;
        $save->save();
        sweetalert()->success("Author $save->name created successfully");
        return redirect()->route('b.author.index');
    }

    public function update($id): View
    {
        $data['author'] = Author::findOrFail($id);
        return view('backend.author.update', $data);
    }

    public function update_store(AuthorRequest $request, $id):RedirectResponse
    {
        $status = $request->status ?? 0;
        $save = Author::findOrFail($id);
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $status;
        $save->updated_by = auth()->user()->id;
        $save->save();
        sweetalert()->success("Author $save->name updated successfully");
        return redirect()->route('b.author.index');
    }
    public function status($id){
        $author = Author::findOrFail($id);
        if($author->status ==1){
            $author->status = 0;
        }else{
            $author->status = 1;
        }
        $author->save();
        sweetalert()->success("Author $author->name status updated successfully");
        return redirect()->route('b.author.index');
    }
    public function delete($id){
        $author = Author::findOrFail($id);
        $author->delete();

        sweetalert()->success("Author $author->title deleted successfully");
        return redirect()->route('b.author.index');
    }
    public function details($id){
        $author = Author::with(['created_user','updated_user'])->findOrFail($id);
        $author->created_time=timeFormate($author->created_at);
        $author->updated_time=($author->created_at != $author->updated_at) ? timeFormate($author->updated_at):'null';
        $author->statusBg=$author->statusBg();
        $author->statusTitle=$author->statusTitle();
        $author->reporterType=$author->type();

        return response()->json(['author'=>$author]);
    }
}
