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
        $totalProjectAmount = ProjectHistory::count('project_budget');
        $totalProjectIncome = ProjectHistory::count('project_amount_paid');
        $totalProjectDue = ProjectHistory::count('project_due');
        return view('admin.dashboard',compact('totalProject','totalProjectAmount',
        'totalProjectIncome','totalProjectDue'));
    }
}
