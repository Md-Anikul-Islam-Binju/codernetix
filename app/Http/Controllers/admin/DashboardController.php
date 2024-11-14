<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectHistory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProject = ProjectHistory::count();
        $totalProjectAmount = ProjectHistory::sum('project_budget');
        $totalProjectIncome = ProjectHistory::sum('project_amount_paid');
        $totalProjectDue = ProjectHistory::sum('project_due');
        return view('admin.dashboard',compact('totalProject','totalProjectAmount',
        'totalProjectIncome','totalProjectDue'));
    }
}
