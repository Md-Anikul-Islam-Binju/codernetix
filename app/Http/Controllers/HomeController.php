<?php

namespace App\Http\Controllers;

use App\Models\ApplyCandidate;
use App\Models\Career;
use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Technology;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        $technology = Technology::where('status',1)->get();
        $client = Client::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $team = Team::where('status',1)->get();
        $project = Project::where('status',1)->get();
        $product  = Product::where('status',1)->get();
        return view('frontend.index',compact('technology','client','service','team','project','product'));
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.support.privacyPolicy');
    }

    public function career()
    {
        $career = Career::where('status', 1)->get();
        return view('frontend.pages.career.career', compact('career'));
    }


    public function applyCandidate($id)
    {
        $job = Career::findOrFail($id);
        return view('frontend.pages.career.applyCandidate',compact('job'));
    }

    public function applyCandidateStore(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'cv_or_resume' => 'required|mimes:pdf,doc,docx|max:4096',
        ]);

        // Upload CV
        if ($request->hasFile('cv_or_resume')) {
            $cvName = time().'_'.$request->cv_or_resume->getClientOriginalName();
            $request->cv_or_resume->move(public_path('images/cv'), $cvName);
        }

        ApplyCandidate::create([
            'job_id' => $request->job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'join_type' => $request->join_type,
            'expected_salary' => $request->expected_salary??'',
            'cv_or_resume' => $cvName,
            'github_link' => $request->github_link,
            'linkedin_link' => $request->linkedin_link,
            'portfolio_link' => $request->portfolio_link,
        ]);

        Toastr::success('Your application submitted successfully!', 'Success');
        return redirect()->back();
    }





}
