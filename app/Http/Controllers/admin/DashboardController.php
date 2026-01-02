<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyCandidate;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductRequest;
use App\Models\ProjectHistory;
use App\Models\ProjectPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProject = ProjectHistory::count();
        $totalProjectAmount = ProjectHistory::sum('project_budget');
        $totalProjectIncome = ProjectPayment::sum('project_amount_paid');
        $totalProjectDue = $totalProjectAmount-$totalProjectIncome;

        //Total Ready Product
        $totalProduct = Product::count();
        //Total Ready Product Request
        $totalProductRequest = ProductRequest::count();
        //Total Contact Request
        $totalContactRequest = Contact::count();
        //Total Job Application
        $totalJobApplication = ApplyCandidate::count();

        //Project
        $latestPayments = DB::table('project_payments as pp')
            ->select('pp.project_id', 'pp.project_due')
            ->join(DB::raw('(SELECT project_id, MAX(id) as max_id
                     FROM project_payments
                     GROUP BY project_id) as latest'), function($join) {
                $join->on('pp.project_id', '=', 'latest.project_id')
                    ->on('pp.id', '=', 'latest.max_id');
            });
        $completeProject = ProjectHistory::whereIn('id', $latestPayments->clone()->where('pp.project_due', 0)->pluck('project_id'))->count();
        $ongoingProject = ProjectHistory::whereIn('id', $latestPayments->clone()->where('pp.project_due', '>', 0)->pluck('project_id'))->count();
        $data =  [
            'labels' => ['Total Amount', 'Amount Recived', 'Amount Pending'],
            'value' => [$totalProjectAmount, $totalProjectIncome, $totalProjectDue],
        ];


        return view('admin.dashboard',compact('totalProject','totalProjectAmount',
        'totalProjectIncome','totalProjectDue','data','completeProject','ongoingProject',
        'totalProduct','totalProductRequest','totalContactRequest','totalJobApplication'));
    }
}
