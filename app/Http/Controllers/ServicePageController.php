<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Models\Technology;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function service()
    {
        $service = Service::where('status',1)->get();
        $technology = Technology::where('status',1)->get();
        $client = Client::where('status',1)->get();
        return view('frontend.pages.service.service',compact('service','technology','client'));
    }
}
