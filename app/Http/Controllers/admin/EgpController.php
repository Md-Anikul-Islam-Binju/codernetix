<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Egp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Yoeunes\Toastr\Facades\Toastr;

class EgpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('egp-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $today = now()->startOfDay();

        $egps = Egp::latest()->get()->map(function ($egp) use ($today) {
            $endDate = \Carbon\Carbon::parse($egp->end_date)->startOfDay();

            $daysLeft = (int) $today->diffInDays($endDate, false);

            $egp->days_left = $daysLeft;

            if ($daysLeft < 0) {
                $egp->computed_status = 'Over';
            } elseif ($daysLeft <= 20) {
                $egp->computed_status = 'Urgent';
            } elseif ($daysLeft <= 30) {
                $egp->computed_status = 'Upcoming';
            } else {
                $egp->computed_status = 'Relax';
            }

            return $egp;
        });

        return view('admin.pages.egp.index', compact('egps'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'tender_id' => 'required|string|max:255|unique:egps,tender_id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'security_amount' => 'required|numeric|min:0',
            ]);

            Egp::create($validated);

            Toastr::success('E-GP Tender Added Successfully', 'Success');

            return redirect()->back();
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to add E-GP tender.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $egp = Egp::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'tender_id' => 'required|string|max:255|unique:egps,tender_id,' . $egp->id,
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'security_amount' => 'required|numeric|min:0',
            ]);

            $egp->update($validated);

            Toastr::success('E-GP Tender Updated Successfully', 'Success');

            return redirect()->back();
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to update E-GP tender.');
        }
    }

    public function destroy($id)
    {
        try {
            $egp = Egp::findOrFail($id);
            $egp->delete();

            Toastr::success('E-GP Tender Deleted Successfully', 'Success');

            return redirect()->back();
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()
                ->with('error', 'Unable to delete E-GP tender.');
        }
    }
}
