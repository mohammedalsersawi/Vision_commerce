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
        $o_count = Order::count();
        $u_count = User::count();
        $c_count = Category::count();
        $p_count = Product::count();
        $b_count = Blog::count();
        $t_count = Testimonial::count();
        return view('admin.dashboard', compact('o_count', 'u_count', 'c_count', 'p_count', 'b_count', 't_count'));
    }
    public function orders()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }
    public function orders_details($id)
    {
        $order = Order::find($id);
        return view('admin.orders_details', compact('order'));
    }


    public function users()
    {
        if(request()->filled('search')) {
             $users = User::where('type', 'user')
             ->where(function($query){
                $query->where('name',  'like', '%'. request()->search . '%')
                ->orWhere('email', 'like', '%'. request()->search . '%');
             })
             ->latest()
             ->paginate(10);
        }else {
            $users = User::where('type', 'user')->latest()->paginate(10);
        }
    //    return $users;
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
