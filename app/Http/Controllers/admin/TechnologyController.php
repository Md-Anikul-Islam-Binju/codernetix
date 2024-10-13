<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Toastr;

class TechnologyController extends Controller
{
    public function index()
    {
        $technology = Technology::all();
        return view('admin.pages.technology.index', compact('technology'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'logo' => 'required',
            ]);
            $file = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/technology'), $file);

            $technology = new Technology();
            $technology->name = $request->name;
            $technology->details = $request->details;
            $technology->logo = $file;
            $technology->save();
            Toastr::success('Technology Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'name' => 'required',
            ]);
            $technology = Technology::find($id);
            $technology->name = $request->name;
            $technology->details = $request->details;
            $technology->status = $request->status;

            if ($request->logo) {
                $file = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('images/technology'), $file);
                $technology->logo = $file;
            }
            $technology->save();
            Toastr::success('Technology Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $technology = Technology::find($id);
            $filePath = public_path('images/technology/' . $technology->logo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $technology->delete();
            Toastr::success('Technology Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
