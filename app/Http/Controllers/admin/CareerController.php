<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyCandidate;
use App\Models\Career;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class CareerController extends Controller
{
    public function index()
    {
        $career = Career::all();
        return view('admin.pages.career.index', compact('career'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'details' => 'nullable|string',
            ]);
            $career = new Career();
            $career->title = $request->title;
            $career->link = $request->link??'';
            $career->details = $request->details;
            $career->save();
            Toastr::success('Career Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'details' => 'nullable|string',
            ]);
            $career = Career::find($id);
            $career->title = $request->title;
            $career->link = $request->link??'';
            $career->details = $request->details;
            $career->status = $request->status;
            $career->save();
            Toastr::success('Career Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $career = Career::find($id);
            $career->delete();
            Toastr::success('Career Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function application($job_id)
    {
        $applyCandidates = ApplyCandidate::where('job_id', $job_id)->get();
        return view('admin.pages.career.application', compact('applyCandidates'));
    }

    public function applicationDelete($id)
    {
        try {
            $application = ApplyCandidate::findOrFail($id);

            // DELETE CV FILE
            if ($application->cv_or_resume) {
                $cvPath = public_path('images/cv/' . $application->cv_or_resume);
                if (file_exists($cvPath)) {
                    unlink($cvPath);
                }
            }

            // DELETE DB ROW
            $application->delete();

            Toastr::success('Application Deleted Successfully', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }








}
