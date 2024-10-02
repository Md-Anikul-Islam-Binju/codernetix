<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function service()
    {
        $service = Service::where('status',1)->get();
        return view('frontend.pages.service.service',compact('service'));
    }
}
