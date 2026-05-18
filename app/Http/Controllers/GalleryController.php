<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {

        $firstItem = Gallery::offset(0)->limit(1)->first();
        //1st 1 item skip next 2 item
        $secondSet = Gallery::offset(1)->limit(2)->get();
        //1st 3 skip  4th item only
        $fourthItem = Gallery::offset(3)->limit(1)->first();

        $gallery = Gallery::offset(4)->limit(100000)->get();

        return view('frontend.pages.gallery.gallery',compact('gallery','firstItem','secondSet','fourthItem'));
    }
}
