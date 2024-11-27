<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectHistory;
use App\Models\ProjectPayment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProject = ProjectHistory::count();
        $totalProjectAmount = ProjectHistory::sum('project_budget');
        $totalProjectIncome = ProjectPayment::sum('project_amount_paid');
        $totalProjectDue = ProjectPayment::sum('project_due');
        return view('admin.dashboard',compact('totalProject','totalProjectAmount',
        'totalProjectIncome','totalProjectDue'));
    }
}
