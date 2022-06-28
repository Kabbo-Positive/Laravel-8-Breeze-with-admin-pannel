<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $category_count = DB::table('categories')->count();
        $product_count = DB::table('products')->count();
        $contact_count = DB::table('contacts')->count();
        $user_count = User::where('role_as','0')->count();
        return view('admin.dashboard.index',compact('category_count','product_count','contact_count','user_count'));
    }
}
