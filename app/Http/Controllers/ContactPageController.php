<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function contact()
    {
        $siteSetting = SiteSetting::first();
        return view('frontend.pages.contact.contact',compact('siteSetting'));
    }
}
