<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $category = ProductCategory::latest()->get();
        $product = Product::all();
        return view('admin.pages.product.product', compact('product', 'category'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/product'), $file);

            $product = new Product();
            $product->product_category_id = $request->product_category_id;
            $product->title = $request->title;
            $product->key_highlights = $request->key_highlights;
            $product->long_details = $request->long_details;
            $product->link = $request->link;
            $product->credential = $request->credential;
            $product->image = $file;
            $product->save();
            Toastr::success('Product Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        //dd($request->all());
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $product = Product::find($id);
            $product->product_category_id = $request->product_category_id;
            $product->title = $request->title;
            $product->key_highlights = $request->key_highlights;
            $product->long_details = $request->long_details;
            $product->link = $request->link;
            $product->credential = $request->credential;
            $product->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/product'), $file);
                $product->image = $file;
            }
            $product->save();
            Toastr::success('Product Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $filePath = public_path('images/product/' . $product->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $product->delete();
            Toastr::success('Product Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function productRequest()
    {
        $productRequests = ProductRequest::with('product')->latest()->get();
        return view('admin.pages.product.requestProductList', compact('productRequests'));
    }

    public function productRequestDelete($id)
    {
        try {
            $productRequest = ProductRequest::find($id);
            $productRequest->delete();
            Toastr::success('Product Request Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
