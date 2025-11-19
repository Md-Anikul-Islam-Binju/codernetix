<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yoeunes\Toastr\Facades\Toastr;

class ReadyProductController extends Controller
{

    public function readyProduct()
    {
        $product = Product::where('status',1)->get();
        return view('frontend.pages.product.product',compact('product'));
    }


    public function readyProductDetails($id)
    {
        $product = Product::where('id',$id)->first();
        return view('frontend.pages.product.readyProduct',compact('product'));
    }

    public function storeProductRequest(Request $request)
    {

        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'name'       => 'required|string|max:255',
                'email'      => 'required|email',
                'phone'      => 'required|string|max:20',
                'address'    => 'required|string|max:500',
                'g-recaptcha-response' => 'required'
            ]);

            //Google reCAPTCHA
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
            ]);
            $recaptcha = $response->json();
            if (!($recaptcha['success'] ?? false)) {
                return back()->withErrors(['captcha' => 'reCAPTCHA verification failed, please try again.']);
            }

            $productRequest = new ProductRequest();
            $productRequest->product_id = $request->product_id;
            $productRequest->name       = $request->name;
            $productRequest->email      = $request->email;
            $productRequest->phone      = $request->phone;
            $productRequest->address    = $request->address;
            $productRequest->save();

            Toastr::success('Your product request has been submitted successfully.', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


}
