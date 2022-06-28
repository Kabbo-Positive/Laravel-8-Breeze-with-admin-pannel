<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(12);
        return view('admin.category.category', compact('categories'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $categories = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/category', $filename);
            $categories->image = $filename;
        }
        $categories->name = $request->input('name');
        $categories->slug = $request->input('slug');
        $categories->description = $request->input('description');
        $categories->status = $request->status == true ? '1':'0';
        $categories->popular = $request->popular == true ? '1':'0';
        $categories->meta_title = $request->input('meta_title');
        $categories->meta_description = $request->input('meta_description');
        $categories->meta_keyword = $request->input('meta_keyword');
        $categories->save();

        return redirect()->route('add_category')->with('status', "Category Added Successfully");
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        
        $categories = Category::find($id);
        if ($request->hasFile('image')) {

            $path = 'assets/category/' . $categories->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/category', $filename);
            $categories->image = $filename;
        }
        $categories->name = $request->input('name');
        $categories->slug = $request->input('slug');
        $categories->description = $request->input('description');
        $categories->status = $request->status == true ? '1':'0';
        $categories->popular = $request->popular == true ? '1':'0';
        $categories->meta_title = $request->input('meta_title');
        $categories->meta_description = $request->input('meta_description');
        $categories->meta_keyword = $request->input('meta_keyword');
        $categories->update();
        return redirect()->route('all_category')->with('status', "Category Updated Successfully");
    }

    public function delete($id)
    {
        $categories = Category::find($id);
        if ($categories->image) {
            $path = 'assets/category/' . $categories->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $categories->delete();
        return redirect()->route('all_category')->with('status', "Category Deleted Successfully");
    }
}
