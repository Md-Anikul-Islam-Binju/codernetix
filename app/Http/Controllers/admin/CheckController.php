<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('check-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $check = Check::with('user')->latest()->get();
        $users = User::latest()->get();
        return view('admin.pages.check.index', compact('check', 'users'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $check = new Check();
            $check->title = $request->title;
            $check->assign_id = $request->assign_id;
            $check->save();
            Toastr::success('Check List Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $check = Check::find($id);
            $check->complete_date = $request->complete_date;
            $check->status = $request->status;
            $check->save();
            Toastr::success('Check List Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $check = Check::find($id);
            $check->delete();
            Toastr::success('Check List Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
