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
        $save = new Author();
        $save->name = $request->name;
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
        $save = Author::findOrFail($id);
        $save->name = $request->name;
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
}