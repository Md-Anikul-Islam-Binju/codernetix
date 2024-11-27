<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Models\ProjectHistory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProjectHistoryController extends Controller
{
    public function index()
    {
        $category = ProjectCategory::all();
        $project = ProjectHistory::with('category')->latest()->get();
        return view('admin.pages.inventory.project.index', compact('category','project'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'category_id' => 'required',
                'project_name' => 'required',
                'project_type' => 'required',
                'project_document' => 'nullable|file|mimes:pdf',
            ]);

            // Handle file upload if a document is provided
            $filePath = null;
            if ($request->hasFile('project_document')) {
                $filePath = time() . '.' . $request->project_document->extension();
                $request->project_document->move(public_path('documents/project-history'), $filePath);
            }

            // Create a new ProjectHistory instance
            $projectHistory = new ProjectHistory();
            $projectHistory->category_id = $request->category_id;
            $projectHistory->project_name = $request->project_name;
            $projectHistory->project_type = $request->project_type;
            $projectHistory->project_document = $filePath; // Save file path if uploaded
            $projectHistory->project_complete_duration = $request->project_complete_duration;
            $projectHistory->project_budget = $request->project_budget;
            $projectHistory->project_start_date = $request->project_start_date;
            $projectHistory->project_end_date = $request->project_end_date;
            $projectHistory->client_name = $request->client_name;
            $projectHistory->client_email = $request->client_email;
            $projectHistory->client_phone = $request->client_phone;
            $projectHistory->client_address = $request->client_address;
            $projectHistory->save();

            // Success message
            Toastr::success('Project History Added Successfully', 'Success');
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
                'category_id' => 'required',
                'project_name' => 'required',
                'project_type' => 'required',
                'project_document' => 'nullable|file|mimes:pdf',
            ]);
            $projectHistory = ProjectHistory::find($id);
            $projectHistory->category_id = $request->category_id;
            $projectHistory->project_name = $request->project_name;
            $projectHistory->project_type = $request->project_type;
            $projectHistory->project_complete_duration = $request->project_complete_duration;
            $projectHistory->project_budget = $request->project_budget;
            $projectHistory->project_start_date = $request->project_start_date;
            $projectHistory->project_end_date = $request->project_end_date;
            $projectHistory->client_name = $request->client_name;
            $projectHistory->client_email = $request->client_email;
            $projectHistory->client_phone = $request->client_phone;
            $projectHistory->client_address = $request->client_address;
            if ($request->project_document) {
                $file = time() . '.' . $request->project_document->extension();
                $request->project_document->move(public_path('documents/project-history'), $file);
                $projectHistory->project_document = $file;
            }
            $projectHistory->save();
            Toastr::success('Project History Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $projectHistory = ProjectHistory::find($id);
            $filePath = public_path('documents/project-history/' . $projectHistory->project_document);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $projectHistory->delete();
            Toastr::success('Project History Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }




}
