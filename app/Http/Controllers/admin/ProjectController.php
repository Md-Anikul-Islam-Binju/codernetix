<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return view('admin.pages.project.index', compact('project'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/project'), $file);

            $project = new Project();
            $project->title = $request->title;
            $project->details = $request->details;
            $project->link = $request->link;
            $project->image = $file;
            $project->save();
            Toastr::success('Project Added Successfully', 'Success');
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
                'title' => 'required',
            ]);
            $project = Project::find($id);
            $project->title = $request->title;
            $project->details = $request->details;
            $project->link = $request->link;
            $project->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/project'), $file);
                $project->image = $file;
            }
            $project->save();
            Toastr::success('Project Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::find($id);
            $filePath = public_path('images/project/' . $project->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $project->delete();
            Toastr::success('Project Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
