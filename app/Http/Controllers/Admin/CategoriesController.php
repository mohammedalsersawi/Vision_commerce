<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('search')) {
            $categories = Category::where('name', 'like', '%' . request()->search . '%')->latest()->paginate(5);
        } else {
            $categories = Category::latest('id')->paginate(6);
        }
        $AddParent = Category::all();

        return view('admin.Categories.index', compact('categories' , 'AddParent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Categories.model', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:30',
            'image' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/CategoryImage'), $filename);

        Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $filename,
                'parent_id' => $request->parent_id,
        ]);


        $categories = Category::latest()->paginate(5);


        return view('admin.Categories.table' , compact('categories'))->render();


 //return $request;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorFail($id);
        $categories = Category::all();

        return view('admin.Categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category = Category::findorFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('admin.categories.index')
            ->with('msg', 'category updated successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        /* Category::where('parent_id' , $id)->update([
         'parent_id' => null

        ]);*/
        Category::where('parent_id', $id)->delete();

        return redirect()->route('admin.categories.index')
            ->with('msg', 'category deleted successfully')
            ->with('type', 'danger');
    }
}
