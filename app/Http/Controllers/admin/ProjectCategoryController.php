<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $category = ProjectCategory::all();
        return view('admin.pages.inventory.category.index', compact('category'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $projectCategory = new ProjectCategory();
            $projectCategory->name = $request->name;
            $projectCategory->save();
            Toastr::success('Project Category Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'name' => 'required',
            ]);
            $projectCategory = ProjectCategory::find($id);
            $projectCategory->name = $request->name;
            $projectCategory->status = $request->status;
            $projectCategory->save();
            Toastr::success('Project Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $projectCategory = ProjectCategory::find($id);
            $projectCategory->delete();
            Toastr::success('Project Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
