<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ExpenseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('inventory-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $expenseCategory = ExpenseCategory::latest()->get();
        $expense = Expense::with('category')->latest()->get();
        return view('admin.pages.inventory.project.expense', compact('expenseCategory', 'expense'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $expense = new Expense();
            $expense->expense_category_id = $request->expense_category_id;
            $expense->title = $request->title;
            $expense->details = $request->details;
            $expense->amount = $request->amount;
            $expense->date = $request->date;
            $expense->save();
            Toastr::success('Expense Added Successfully', 'Success');
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
            $expense = Expense::find($id);
            $expense->expense_category_id = $request->expense_category_id;
            $expense->title = $request->title;
            $expense->details = $request->details;
            $expense->amount = $request->amount;
            $expense->date = $request->date;
            $expense->status = $request->status;
            $expense->save();
            Toastr::success('Expense Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $expense = Expense::find($id);
            $expense->delete();
            Toastr::success('Expense Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
