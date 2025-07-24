<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = ProductCategory::all();
        return view('admin.pages.product.category', compact('category'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $productCategory = new ProductCategory();
            $productCategory->name = $request->name;
            $productCategory->save();
            Toastr::success('Product Category Added Successfully', 'Success');
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
                'name' => 'required',
            ]);
            $productCategory = ProductCategory::find($id);
            $productCategory->name = $request->name;
            $productCategory->status = $request->status;
            $productCategory->save();
            Toastr::success('Product Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $productCategory = ProductCategory::find($id);
            $productCategory->delete();
            Toastr::success('Product Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
