<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = DB::table('contacts')->paginate(10);
        return view('admin.contact.contact', compact('contacts'));
    }

    public function delete($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        return redirect()->route('contact')->with('status', "Contact Deleted Successfully");
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $contacts = Contact::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->orWhere('phone','LIKE',"%$search%")->paginate(15);
        return view('admin.contact.contact', compact('contacts','search'));
    }
}
