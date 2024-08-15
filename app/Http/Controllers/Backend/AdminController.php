<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index():View
    {
        $data['admins'] = User::latest()->get();
        return view('backend.admin.index', $data);
    }

    public function create():view
    {
        return view('backend.admin.create');
    }

    public function store(AdminRequest $request): RedirectResponse
    {

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;
        $save->created_by = auth()->user()->id;
        $save->save();

        sweetalert()->success("Admin $save->name created successfully");
        return redirect()->route('b.admin.index');
    }

    public function update($id): View
    {
        $data['admin'] = User::findOrFail($id);
        return view('backend.admin.update', $data);
    }


    public function update_store(AdminRequest $request, $id): RedirectResponse
    {

        $save = User::findOrFail($id);
        $save->name = $request->name;
        $save->email = $request->email;
        if($request->password){
            $save->password = $request->password;
        }
        $save->status = $request->status ?? 0;
        $save->updated_by = auth()->user()->id;
        $save->save();

        sweetalert()->success("Admin $save->name updated successfully");
        return redirect()->route('b.admin.index');
    }
    public function status($id){
        $admin = User::findOrFail($id);
        if($admin->status ==1){
            $admin->status = 0;
        }else{
            $admin->status = 1;
        }
        $admin->save();
        sweetalert()->success("Admin $admin->name status updated successfully");
        return redirect()->route('b.admin.index');
    }
    public function delete($id){
        $admin = User::findOrFail($id);
        $admin->delete();

        sweetalert()->success("Admin $admin->title deleted successfully");
        return redirect()->route('b.admin.index');
    }
    public function details($id){
        $admin = User::with(['created_user','updated_user'])->findOrFail($id);
        $admin->created_time=timeFormate($admin->created_at);
        $admin->updated_time=($admin->created_at != $admin->updated_at) ? timeFormate($admin->updated_at):'null';
        $admin->statusBg=$admin->statusBg();
        $admin->statusTitle=$admin->statusTitle();



        return response()->json(['admin'=>$admin]);
    }
}
