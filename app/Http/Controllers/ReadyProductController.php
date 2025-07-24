<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReadyProductController extends Controller
{
    public function readyProduct($id)
    {
        $product = Product::where('id',$id)->first();
        return view('frontend.pages.product.readyProduct',compact('product'));
    }

}
