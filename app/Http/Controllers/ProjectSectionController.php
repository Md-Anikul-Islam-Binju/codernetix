<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectSectionController extends Controller
{
    public function project()
    {
        $project = Project::where('status',1)->get();
        $client = Client::where('status',1)->get();
        return view('frontend.pages.project.project',compact('project','client'));
    }
}
