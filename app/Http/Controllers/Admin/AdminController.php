<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');

    }



    public function users()
    {
        if(request()->has('search')) {
            $users = User::where('type', 'user')->where('name', 'like', '%'. request()->search . '%')->orWhere('email', 'like', '%'. request()->search . '%')->latest()->paginate(10);
        }else {
            $users = User::where('type', 'user')->latest()->paginate(10);
        }
        return view('admin.users', compact('users'));
    }



    public function admins()
    {
        $admins = User::where('type', 'admin')->latest()->paginate(10);
        $roles = Role::all();
        return view('admin.admins', compact('admins', 'roles'));
    }

    public function admins_edit(Request $request, $id)
    {
        User::find($id)->update(['role_id' => $request->role_id]);

        return redirect()->back();
    }
}
