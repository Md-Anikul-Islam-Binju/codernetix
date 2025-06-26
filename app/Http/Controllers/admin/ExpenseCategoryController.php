<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $category = ExpenseCategory::latest()->get();
        return view('admin.pages.inventory.category.expenseCategory', compact('category'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $category = new ExpenseCategory();
            $category->name = $request->name;
            $category->save();
            Toastr::success('Expense Category Added Successfully', 'Success');
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
            $category = ExpenseCategory::find($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            Toastr::success('Expense Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = ExpenseCategory::find($id);
            $category->delete();
            Toastr::success('Expense Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
