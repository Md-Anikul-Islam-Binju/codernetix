<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.pages.contact.index', compact('contact'));
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            Toastr::success('Contact Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
