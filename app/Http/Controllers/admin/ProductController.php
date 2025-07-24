<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
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
            $product->short_details = $request->short_details;
            $product->long_details = $request->long_details;
            $product->link = $request->link;
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

        try {
            $request->validate([
                'title' => 'required',
            ]);
            $product = Product::find($id);
            $product->product_category_id = $request->product_category_id;
            $product->title = $request->title;
            $product->short_details = $request->short_details;
            $product->long_details = $request->long_details;
            $product->link = $request->link;
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
}
