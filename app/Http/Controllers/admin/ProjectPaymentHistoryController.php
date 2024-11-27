<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Models\ProjectHistory;
use App\Models\ProjectPayment;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProjectPaymentHistoryController extends Controller
{
    public function show($id)
    {
        $projectHistory = ProjectHistory::where('id',$id)->first();
        $projectPayment = ProjectPayment::where('project_id',$id)->with('project')->get();

        $lastPayment = ProjectPayment::where('project_id', $id)
            ->latest('id')
            ->first();
        $currentDue = $lastPayment ? $lastPayment->project_due : $projectHistory->project_budget;
        return view('admin.pages.inventory.project.payment', compact('projectPayment','projectHistory','currentDue'));
    }

    public function store(Request $request)
    {
        try {
            // Retrieve the last payment for the project
            $lastPayment = ProjectPayment::where('project_id', $request->project_id)
                ->latest('id')
                ->first();

            // Calculate the current due
            $currentDue = $lastPayment ? $lastPayment->project_due : $request->project_budget;

            // Ensure the payment does not exceed the due amount
            if ($request->project_amount_paid > $currentDue) {
                return redirect()->back()->with('error', 'Payment amount exceeds the remaining due.');
            }

            // Create a new payment record
            $projectPayment = new ProjectPayment();
            $projectPayment->project_id = $request->project_id;
            $projectPayment->project_budget = $request->project_budget;
            $projectPayment->project_amount_paid = $request->project_amount_paid;
            $projectPayment->project_due = $currentDue - $request->project_amount_paid; // Update due
            $projectPayment->payment_date = $request->payment_date;
            $projectPayment->save();

            Toastr::success('Project Payment History Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {

        try {
            $projectPaymentHistory = ProjectPayment::find($id);
            $projectPaymentHistory->project_id = $request->project_id;
            $projectPaymentHistory->project_budget = $request->project_budget;
            $projectPaymentHistory->project_amount_paid = $request->project_amount_paid;
            $projectPaymentHistory->project_due = $request->project_budget - $request->project_amount_paid;
            $projectPaymentHistory->payment_date = $request->payment_date;
            $projectPaymentHistory->save();
            Toastr::success('Project Payment History Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $projectPaymentHistory = ProjectPayment::find($id);
            $projectPaymentHistory->delete();
            Toastr::success('Project Payment History Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
