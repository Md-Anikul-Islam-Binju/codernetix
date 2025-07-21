<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadyProductController extends Controller
{
    public function readyProduct()
    {
        return view('frontend.pages.product.readyProduct');
    }

}
