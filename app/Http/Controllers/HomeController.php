<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Technology;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $technology = Technology::where('status',1)->get();
        $client = Client::where('status',1)->get();
        $service = Service::where('status',1)->get();
        $team = Team::where('status',1)->get();
        return view('frontend.index',compact('technology','client','service','team'));
    }
}
