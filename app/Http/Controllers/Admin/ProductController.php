<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(12);
        return view('admin.product.product',compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.product.add',compact('categories'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'small_description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
        ]);
        
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/product', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->category_id = $request->input('category_id');
        $products->description = $request->input('description');
        $products->small_description = $request->input('small_description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->status == true ? '1':'0';
        $products->trending = $request->trending == true ? '1':'0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->save();

        return redirect()->route('add_product')->with('status', "Product Added Successfully");
    }

    public function edit($id)
    {
        $categories = Category::all();
        $products = Product::find($id);
        return view('admin.product.edit', compact('products','categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'small_description' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
        ]);

        $products = Product::find($id);
        if ($request->hasFile('image')) {

            $path = 'assets/product/' . $products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/product', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->small_description = $request->input('small_description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->status == true ? '1':'0';
        $products->trending = $request->trending == true ? '1':'0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');
        $products->update();
        return redirect()->route('all_product')->with('status', "Product Updated Successfully");
    }

    public function delete($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'assets/product/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect()->route('all_product')->with('status', "Product Deleted Successfully");
    }
}
