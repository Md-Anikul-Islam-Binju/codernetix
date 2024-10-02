<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function about()
    {
        return view('frontend.pages.about.about');
    }
}
